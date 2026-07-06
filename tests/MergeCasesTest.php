<?php

declare(strict_types=1);

use Stamat\TailwindMerge\TailwindMerge;

/**
 * Cases extracted from the upstream tailwind-merge (JS) test suites and
 * verified against the real JS implementation — see tests/Fixtures/merge-cases.json.
 */
function upstreamMergeCases(): Generator
{
    $json = file_get_contents(__DIR__ . '/Fixtures/merge-cases.json');
    assert($json !== false);

    /** @var array<string, list<array{args: array<int, mixed>, expected: string}>> $suites */
    $suites = json_decode($json, true, 32, JSON_THROW_ON_ERROR);

    foreach ($suites as $suite => $cases) {
        foreach ($cases as $index => $case) {
            yield "{$suite} #{$index} " . json_encode($case['args']) => [$case['args'], $case['expected']];
        }
    }
}

test('matches upstream tailwind-merge output', function (array $args, string $expected): void {
    expect(TailwindMerge::instance()->merge(...$args))->toBe($expected);
})->with(upstreamMergeCases());

test('merge is idempotent over benchmark data', function (): void {
    $json = file_get_contents(__DIR__ . '/Fixtures/benchmark-data.json');
    assert($json !== false);

    /** @var list<mixed> $inputs */
    $inputs = json_decode($json, true, 32, JSON_THROW_ON_ERROR);

    $tw = TailwindMerge::instance();

    foreach ($inputs as $input) {
        if (! is_string($input) && ! is_array($input)) {
            continue;
        }

        $once = $tw->merge($input);
        expect($tw->merge($once))->toBe($once);
    }
});
