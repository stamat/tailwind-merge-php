<?php

declare(strict_types=1);

namespace Stamat\TailwindMerge;

/**
 * Node in the class-map trie. Mutable during build only; treated as
 * read-only afterwards.
 */
final class ClassPartNode
{
    /** @var array<string, self> */
    public array $nextPart = [];

    /** @var list<array{classGroupId: string, validator: callable(string): bool}> */
    public array $validators = [];

    public ?string $classGroupId = null;
}
