<?php

declare(strict_types=1);

namespace Stamat\TailwindMerge\Laravel;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Stamat\TailwindMerge\TailwindMerge;

final class TailwindMergeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/tailwind-merge.php', 'tailwind-merge');

        $this->app->singleton(TailwindMerge::class, static function (): TailwindMerge {
            /** @var array<string, mixed> $config */
            $config = config('tailwind-merge', []);

            $extension = ['cacheSize' => $config['cacheSize'] ?? 500];

            // Only pass keys the user actually set — an empty extend/override or a
            // null prefix would otherwise clobber the defaults via ConfigMerger.
            foreach (['prefix', 'extend', 'override'] as $key) {
                if (! empty($config[$key])) {
                    $extension[$key] = $config[$key];
                }
            }

            return TailwindMerge::create($extension);
        });

        $this->app->alias(TailwindMerge::class, 'tailwind-merge');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../config/tailwind-merge.php' => $this->app->configPath('tailwind-merge.php'),
            ], 'tailwind-merge');
        }

        // @twMerge('px-2 p-4', $conditional) — resolves the shared, configured instance.
        Blade::directive('twMerge', static fn(string $expression): string => "<?php echo e(app(\\Stamat\\TailwindMerge\\TailwindMerge::class)->merge($expression)); ?>");
    }

    /**
     * @return array<int, string>
     */
    public function provides(): array
    {
        return [TailwindMerge::class, 'tailwind-merge'];
    }
}
