<?php

declare(strict_types=1);

namespace Stamat\TailwindMerge;

use InvalidArgumentException;

/**
 * Merges Tailwind CSS v4 class lists without style conflicts.
 *
 * Port of tailwind-merge v3 `merge-classlist.ts` and public API.
 */
final class TailwindMerge
{
    private static ?self $default = null;

    private readonly ClassMap $classMap;

    private readonly Parser $parser;

    private readonly ?LruCache $cache;

    /**
     * @param  array<string, mixed>  $config  Full config (see DefaultConfig::config() for the shape).
     */
    public function __construct(array $config)
    {
        $this->classMap = new ClassMap($config);
        $this->parser = new Parser($config);

        $cacheSize = $config['cacheSize'] ?? 0;
        $this->cache = is_int($cacheSize) && $cacheSize > 0 ? new LruCache($cacheSize) : null;
    }

    /**
     * Shared instance with the default Tailwind CSS v4 config.
     */
    public static function instance(): self
    {
        return self::$default ??= new self(DefaultConfig::config());
    }

    /**
     * New instance with the default config plus the given extension
     * (`cacheSize`, `prefix`, `override` and `extend` keys).
     *
     * @param  array<string, mixed>  $configExtension
     */
    public static function create(array $configExtension = []): self
    {
        if ($configExtension === []) {
            return new self(DefaultConfig::config());
        }

        return new self(ConfigMerger::merge(DefaultConfig::config(), $configExtension));
    }

    /**
     * Merges the given class lists. Accepts strings and arbitrarily nested
     * arrays of strings; `null` and `false` entries are skipped.
     *
     * @param  string|array<array-key, mixed>|null|false  ...$classLists
     */
    public function merge(string|array|false|null ...$classLists): string
    {
        $joined = self::join($classLists);

        if (trim($joined) === '') {
            return '';
        }

        if ($this->cache === null) {
            return $this->mergeClassList($joined);
        }

        $cached = $this->cache->get($joined);

        if ($cached !== null) {
            return $cached;
        }

        $result = $this->mergeClassList($joined);
        $this->cache->set($joined, $result);

        return $result;
    }

    /**
     * @param  array<array-key, mixed>  $classLists
     */
    private static function join(array $classLists): string
    {
        $joined = '';

        foreach ($classLists as $classList) {
            if ($classList === null || $classList === false || $classList === '') {
                continue;
            }

            if (is_string($classList)) {
                $joined .= ($joined === '' ? '' : ' ') . $classList;

                continue;
            }

            if (is_array($classList)) {
                $nested = self::join($classList);

                if ($nested !== '') {
                    $joined .= ($joined === '' ? '' : ' ') . $nested;
                }

                continue;
            }

            throw new InvalidArgumentException(
                'Class lists must contain only strings, nested arrays, null or false, ' . get_debug_type($classList) . ' given.',
            );
        }

        return $joined;
    }

    private function mergeClassList(string $classList): string
    {
        /**
         * Map of class group ids in the following format:
         * `{importantModifier}{variantModifiers}{classGroupId}`
         *
         * @var array<string, true> $classGroupsInConflict
         */
        $classGroupsInConflict = [];

        $classNames = preg_split('/\s+/', trim($classList)) ?: [];

        $result = '';

        for ($index = count($classNames) - 1; $index >= 0; $index--) {
            $originalClassName = $classNames[$index];

            $parsed = $this->parser->parse($originalClassName);

            if ($parsed['isExternal']) {
                $result = $originalClassName . ($result === '' ? '' : ' ' . $result);

                continue;
            }

            $baseClassName = $parsed['baseClassName'];
            $maybePostfixModifierPosition = $parsed['maybePostfixModifierPosition'];
            $hasPostfixModifier = $maybePostfixModifierPosition !== null;

            if ($hasPostfixModifier) {
                $classGroupId = $this->classMap->getClassGroupId(substr($baseClassName, 0, $maybePostfixModifierPosition));

                if ($classGroupId !== null && $this->classMap->hasPostfixLookup($classGroupId)) {
                    $classGroupIdWithPostfix = $this->classMap->getClassGroupId($baseClassName);

                    if ($classGroupIdWithPostfix !== null && $classGroupIdWithPostfix !== $classGroupId) {
                        $classGroupId = $classGroupIdWithPostfix;
                        $hasPostfixModifier = false;
                    }
                }
            } else {
                $classGroupId = $this->classMap->getClassGroupId($baseClassName);
            }

            if ($classGroupId === null) {
                if (! $hasPostfixModifier) {
                    // Not a Tailwind class
                    $result = $originalClassName . ($result === '' ? '' : ' ' . $result);

                    continue;
                }

                // The `/` might not be a postfix modifier but part of the value
                $classGroupId = $this->classMap->getClassGroupId($baseClassName);

                if ($classGroupId === null) {
                    // Not a Tailwind class
                    $result = $originalClassName . ($result === '' ? '' : ' ' . $result);

                    continue;
                }

                $hasPostfixModifier = false;
            }

            $modifiers = $parsed['modifiers'];

            $variantModifier = match (count($modifiers)) {
                0 => '',
                1 => $modifiers[0],
                default => implode(':', $this->parser->sortModifiers($modifiers)),
            };

            $modifierId = $parsed['hasImportantModifier']
                ? $variantModifier . Parser::IMPORTANT_MODIFIER
                : $variantModifier;

            $classId = $modifierId . $classGroupId;

            if (isset($classGroupsInConflict[$classId])) {
                // Tailwind class omitted due to conflict
                continue;
            }

            $classGroupsInConflict[$classId] = true;

            foreach ($this->classMap->getConflictingClassGroupIds($classGroupId, $hasPostfixModifier) as $group) {
                $classGroupsInConflict[$modifierId . $group] = true;
            }

            // Tailwind class not in conflict
            $result = $originalClassName . ($result === '' ? '' : ' ' . $result);
        }

        return $result;
    }
}
