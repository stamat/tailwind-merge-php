<?php

declare(strict_types=1);

namespace Stamat\TailwindMerge\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use Stamat\TailwindMerge\TailwindMerge;

/**
 * @method static string merge(string|array<array-key, mixed>|false|null ...$classLists)
 *
 * @see \Stamat\TailwindMerge\TailwindMerge
 */
final class TwMerge extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return TailwindMerge::class;
    }
}
