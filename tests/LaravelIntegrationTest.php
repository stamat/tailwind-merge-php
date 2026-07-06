<?php

declare(strict_types=1);

use Illuminate\Config\Repository;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Facade;
use Stamat\TailwindMerge\Laravel\Facades\TwMerge;
use Stamat\TailwindMerge\Laravel\TailwindMergeServiceProvider;
use Stamat\TailwindMerge\TailwindMerge;

// config()/app() ship in illuminate/foundation (not a dev dep here). Define the
// slivers the service provider actually calls so it runs against a bare container.
if (! function_exists('app')) {
    function app(?string $abstract = null): mixed
    {
        $c = Container::getInstance();

        return $abstract === null ? $c : $c->make($abstract);
    }
}

if (! function_exists('config')) {
    function config(?string $key = null, mixed $default = null): mixed
    {
        return $key === null ? app('config') : app('config')->get($key, $default);
    }
}

/**
 * A container that answers the two Application methods boot() touches, so the
 * provider boots without pulling laravel/framework.
 */
final class FakeApp extends Container
{
    public function runningInConsole(): bool
    {
        return false; // skip publishes()
    }

    public function configPath(string $path = ''): string
    {
        return '/config/' . $path;
    }
}

/** Records Blade::directive() calls so we can inspect the compiled output. */
final class BladeRecorder
{
    /** @var array<string, callable> */
    public array $directives = [];

    public function directive(string $name, callable $handler): void
    {
        $this->directives[$name] = $handler;
    }
}

/**
 * Boot the service provider against a bare container. $twConfig is the user's
 * `config/tailwind-merge.php`; the provider merges the package defaults under it.
 */
function bootProvider(array $twConfig = []): FakeApp
{
    $app = new FakeApp();
    $app->instance('config', new Repository(['tailwind-merge' => $twConfig]));
    $app->instance('blade.compiler', new BladeRecorder());

    Container::setInstance($app);
    Facade::clearResolvedInstances();
    Facade::setFacadeApplication($app);

    $provider = new TailwindMergeServiceProvider($app);
    $provider->register();
    $provider->boot();

    return $app;
}

test('container resolves the shared, configured merger as a singleton', function (): void {
    $app = bootProvider();

    $a = $app->make(TailwindMerge::class);
    $b = $app->make(TailwindMerge::class);

    expect($a)->toBeInstanceOf(TailwindMerge::class)
        ->and($a)->toBe($b) // singleton
        ->and($a->merge('p-3 p-2'))->toBe('p-2');
});

test('the tailwind-merge alias resolves the same instance', function (): void {
    $app = bootProvider();

    expect($app->make('tailwind-merge'))->toBe($app->make(TailwindMerge::class));
});

test('empty extend/override and null prefix do not clobber the defaults', function (): void {
    // Default config file: prefix null, extend [], override []. If the provider
    // forwarded these empties, ConfigMerger would wipe the default theme.
    $app = bootProvider();
    $tw = $app->make(TailwindMerge::class);

    expect($tw->merge('hover:block hover:inline'))->toBe('hover:inline')
        ->and($tw->merge('text-lg/7 text-lg/8'))->toBe('text-lg/8');
});

test('config prefix flows through to the merger', function (): void {
    $tw = bootProvider(['prefix' => 'tw'])->make(TailwindMerge::class);

    expect($tw->merge('tw:p-3 tw:p-2'))->toBe('tw:p-2')
        ->and($tw->merge('p-3 p-2'))->toBe('p-3 p-2'); // unprefixed => unknown, untouched
});

test('config extend flows through to the merger', function (): void {
    $tw = bootProvider([
        'extend' => ['theme' => ['spacing' => ['my-space']]],
    ])->make(TailwindMerge::class);

    // Without the extend, 'p-my-space' is unknown and p-3 survives.
    expect($tw->merge('p-3 p-my-space'))->toBe('p-my-space');
});

test('the TwMerge facade merges via the shared instance', function (): void {
    bootProvider();

    expect(TwMerge::merge('px-2 p-4', 'p-8'))->toBe('p-8');
});

test('the @twMerge Blade directive compiles to a merge on the shared instance', function (): void {
    $app = bootProvider();

    /** @var BladeRecorder $blade */
    $blade = $app->make('blade.compiler');
    expect($blade->directives)->toHaveKey('twMerge');

    $compiled = ($blade->directives['twMerge'])("'px-2 p-4', \$conditional");

    expect($compiled)->toBe(
        "<?php echo e(app(\\Stamat\\TailwindMerge\\TailwindMerge::class)->merge('px-2 p-4', \$conditional)); ?>",
    );
});
