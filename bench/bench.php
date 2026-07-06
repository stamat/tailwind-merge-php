<?php

declare(strict_types=1);

/**
 * Benchmarks stamat/tailwind-merge-php against gehrisandro/tailwind-merge-php
 * on the upstream tailwind-merge benchmark data (1322 real-world call arg sets).
 *
 * Run: php bench/bench.php
 */

use Stamat\TailwindMerge\TailwindMerge as StamatTailwindMerge;
use TailwindMerge\TailwindMerge as GehrisandroTailwindMerge;

require __DIR__ . '/../vendor/autoload.php';

$data = json_decode((string) file_get_contents(__DIR__ . '/../tests/Fixtures/benchmark-data.json'), true, 32, JSON_THROW_ON_ERROR);
assert(is_array($data));

// gehrisandro's merge() chokes on null/false entries (JS-style conditional args), strip them
$cleanup = static function (array $args) use (&$cleanup): array {
    $result = [];

    foreach ($args as $arg) {
        if (is_string($arg)) {
            $result[] = $arg;
        } elseif (is_array($arg)) {
            $result[] = $cleanup($arg);
        }
    }

    return $result;
};

$calls = array_map(static fn(array $args): array => $cleanup($args), $data);

$bench = static function (string $label, callable $setup, callable $run, int $iterations = 3) use ($calls): float {
    $times = [];

    for ($i = 0; $i < $iterations; $i++) {
        $subject = $setup();
        $start = hrtime(true);

        foreach ($calls as $args) {
            $run($subject, $args);
        }

        $times[] = (hrtime(true) - $start) / 1e6;
    }

    sort($times);
    $median = $times[intdiv(count($times), 2)];
    printf("%-52s %10.1f ms  (%.3f ms/call median over %d calls)\n", $label, $median, $median / count($calls), count($calls));

    return $median;
};

printf("PHP %s, %d benchmark call arg sets, median of 3 runs\n\n", PHP_VERSION, count($calls));

// Cold: fresh instance per run — measures per-process/per-request cost incl. trie build
$stamatCold = $bench(
    'stamat (cold instance, LRU on)',
    static fn(): StamatTailwindMerge => StamatTailwindMerge::create(),
    static fn(StamatTailwindMerge $tw, array $args): string => $tw->merge(...$args),
);

$stamatNoCache = $bench(
    'stamat (cold instance, LRU off)',
    static fn(): StamatTailwindMerge => StamatTailwindMerge::create(['cacheSize' => 0]),
    static fn(StamatTailwindMerge $tw, array $args): string => $tw->merge(...$args),
);

$gehrisandro = $bench(
    'gehrisandro (no PSR cache)',
    static fn(): GehrisandroTailwindMerge => GehrisandroTailwindMerge::factory()->make(),
    static fn(GehrisandroTailwindMerge $tw, array $args): string => $tw->merge(...$args),
);

printf("\nSpeedup vs gehrisandro: %.0fx (LRU on), %.0fx (LRU off)\n", $gehrisandro / $stamatCold, $gehrisandro / $stamatNoCache);
