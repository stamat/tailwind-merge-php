# tailwind-merge-php

Merge [Tailwind CSS](https://tailwindcss.com) class lists without style conflicts — a fast, independent PHP port of [dcastil/tailwind-merge](https://github.com/dcastil/tailwind-merge), ported directly from the JS source and not a fork of any existing PHP package.

If you are building a complex UI — you should componentize. And if you are using Tailwind and componentizing — you need Tailwind Merge.

- **Tailwind CSS v4 only.** No legacy v3 config (no custom separators, TW3 theme keys, etc.). The v3-style leading `!` important modifier is still parsed, matching upstream.
- **Fast.** Class-map trie built once per instance, native string functions on the hot path, in-process LRU result cache. Roughly 50× faster than [`gehrisandro/tailwind-merge-php`](https://github.com/gehrisandro/tailwind-merge-php) on the same real-world class lists even with the cache disabled, far more with a warm cache (note: that port targets Tailwind v3, this one v4).
- **Defensive.** `strict_types`, final classes, PHPStan level max, invalid config keys and non-string class list entries rejected with `InvalidArgumentException`.
- **Test-based.** The behavior contract is the upstream JS test suite: 371 tests / ~1,900 assertions, including 323 merge cases extracted from and verified against the real `tailwind-merge` v3.6.0.

## Usage

```php
use Stamat\TailwindMerge\TailwindMerge;

// Shared instance, default Tailwind v4 config
TailwindMerge::instance()->merge('px-2 py-1 bg-red hover:bg-dark-red', 'p-3 bg-[#B91C1C]');
// => 'hover:bg-dark-red p-3 bg-[#B91C1C]'

// Strings and nested arrays; null/false entries are skipped
TailwindMerge::instance()->merge('block', ['px-2', $isLarge ? 'text-lg' : null]);
```

### Custom config

```php
// Extend / override the default config (same semantics as extendTailwindMerge in JS)
$tw = TailwindMerge::create([
    'cacheSize' => 1000,
    'prefix' => 'tw',                       // for Tailwind's `tw:` prefix option
    'extend' => [
        'theme' => ['spacing' => ['my-space']],
        'classGroups' => ['shadow' => ['shadow-100', 'shadow-200']],
    ],
    'override' => [ /* replaces instead of appends */ ],
]);

// Or a fully custom config (see DefaultConfig::config() for the shape)
$tw = new TailwindMerge($fullConfig);
```

## Laravel

Framework glue ships in the box and is auto-discovered — no manual provider
registration. Install `illuminate/support` (already present in any Laravel app).

```blade
{{-- Blade directive --}}
<div class="@twMerge('px-2 p-4', $isActive ? 'bg-blue-500' : 'bg-gray-200')">…</div>
```

```php
use Stamat\TailwindMerge\Laravel\Facades\TwMerge;
use Stamat\TailwindMerge\TailwindMerge;

TwMerge::merge('px-2 p-4', 'bg-red');   // facade
app(TailwindMerge::class)->merge(...);   // or resolve from the container
```

The container binds a single shared, configured instance. Publish the config to
tune `cacheSize`, `prefix`, `extend` and `override`:

```sh
php artisan vendor:publish --tag=tailwind-merge
```

## Development

```sh
composer install
composer test          # pest
composer test:types    # phpstan (level max)
composer lint          # pint
```

`src/DefaultConfig.php` is generated from the upstream JS package — do not edit by hand.
The upstream version is pinned in `bin/package-lock.json` and stamped into the generated
file header; bump `bin/package.json` to move it. CI regenerates and fails on drift.

```sh
cd bin && npm install && node generate-default-config.mjs
```

`tests/Fixtures/merge-cases.json` holds merge cases extracted from the upstream test
suites and verified against the real JS implementation.

## License

MIT. Ported from [tailwind-merge](https://github.com/dcastil/tailwind-merge) (MIT, © Dany Castillo).
