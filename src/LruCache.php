<?php

declare(strict_types=1);

namespace Stamat\TailwindMerge;

/**
 * Minimal in-process LRU cache. PHP arrays preserve insertion order, so
 * unset + re-append on access is all the bookkeeping needed.
 */
final class LruCache
{
    /** @var array<string, string> */
    private array $entries = [];

    public function __construct(
        private readonly int $maxSize,
    ) {}

    public function get(string $key): ?string
    {
        if (! isset($this->entries[$key])) {
            return null;
        }

        $value = $this->entries[$key];
        unset($this->entries[$key]);
        $this->entries[$key] = $value;

        return $value;
    }

    public function set(string $key, string $value): void
    {
        if ($this->maxSize < 1) {
            return;
        }

        unset($this->entries[$key]);
        $this->entries[$key] = $value;

        if (count($this->entries) > $this->maxSize) {
            $firstKey = array_key_first($this->entries);
            // array_key_first is never null here: count > maxSize >= 1
            unset($this->entries[$firstKey]);
        }
    }
}
