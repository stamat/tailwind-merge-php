<?php

declare(strict_types=1);

namespace Stamat\TailwindMerge;

/**
 * Reference to a theme scale inside a class group definition,
 * resolved when the class map is built.
 */
final class ThemeRef
{
    public function __construct(
        public readonly string $key,
    ) {}
}
