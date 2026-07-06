<?php

declare(strict_types=1);

namespace Stamat\TailwindMerge;

use InvalidArgumentException;

/**
 * Merges a config extension (`override` / `extend`) into a base config.
 *
 * Port of tailwind-merge v3 `merge-configs.ts`, with unknown keys rejected
 * instead of silently ignored.
 */
final class ConfigMerger
{
    private const GROUP_KEYS = ['theme', 'classGroups', 'conflictingClassGroups', 'conflictingClassGroupModifiers'];

    private const LIST_KEYS = ['postfixLookupClassGroups', 'orderSensitiveModifiers'];

    /**
     * @param  array<string, mixed>  $baseConfig
     * @param  array<string, mixed>  $configExtension
     * @return array<string, mixed>
     */
    public static function merge(array $baseConfig, array $configExtension): array
    {
        foreach (array_keys($configExtension) as $key) {
            if (! in_array($key, ['cacheSize', 'prefix', 'override', 'extend'], true)) {
                throw new InvalidArgumentException("Unknown config key \"{$key}\". Allowed: cacheSize, prefix, override, extend.");
            }
        }

        if (isset($configExtension['cacheSize'])) {
            if (! is_int($configExtension['cacheSize'])) {
                throw new InvalidArgumentException('Config key "cacheSize" must be an integer.');
            }

            $baseConfig['cacheSize'] = $configExtension['cacheSize'];
        }

        if (isset($configExtension['prefix'])) {
            if (! is_string($configExtension['prefix'])) {
                throw new InvalidArgumentException('Config key "prefix" must be a string.');
            }

            $baseConfig['prefix'] = $configExtension['prefix'];
        }

        $override = self::section($configExtension, 'override');
        $extend = self::section($configExtension, 'extend');

        foreach (self::GROUP_KEYS as $groupKey) {
            if (is_array($override[$groupKey] ?? null)) {
                $baseGroup = is_array($baseConfig[$groupKey] ?? null) ? $baseConfig[$groupKey] : [];

                foreach ($override[$groupKey] as $key => $value) {
                    if ($value !== null) {
                        $baseGroup[$key] = $value;
                    }
                }

                $baseConfig[$groupKey] = $baseGroup;
            }
        }

        foreach (self::LIST_KEYS as $listKey) {
            if (isset($override[$listKey])) {
                $baseConfig[$listKey] = $override[$listKey];
            }
        }

        foreach (self::GROUP_KEYS as $groupKey) {
            if (is_array($extend[$groupKey] ?? null)) {
                $baseGroup = is_array($baseConfig[$groupKey] ?? null) ? $baseConfig[$groupKey] : [];

                foreach ($extend[$groupKey] as $key => $value) {
                    if (! is_array($value)) {
                        continue;
                    }

                    $existing = $baseGroup[$key] ?? null;
                    $baseGroup[$key] = is_array($existing) ? [...$existing, ...$value] : $value;
                }

                $baseConfig[$groupKey] = $baseGroup;
            }
        }

        foreach (self::LIST_KEYS as $listKey) {
            if (is_array($extend[$listKey] ?? null)) {
                $existing = $baseConfig[$listKey] ?? null;
                $baseConfig[$listKey] = is_array($existing) ? [...$existing, ...$extend[$listKey]] : $extend[$listKey];
            }
        }

        return $baseConfig;
    }

    /**
     * @param  array<string, mixed>  $configExtension
     * @return array<string, mixed>
     */
    private static function section(array $configExtension, string $key): array
    {
        $section = $configExtension[$key] ?? [];

        if (! is_array($section)) {
            throw new InvalidArgumentException("Config key \"{$key}\" must be an array.");
        }

        foreach (array_keys($section) as $sectionKey) {
            if (! in_array($sectionKey, [...self::GROUP_KEYS, ...self::LIST_KEYS], true)) {
                throw new InvalidArgumentException("Unknown config key \"{$key}.{$sectionKey}\".");
            }
        }

        /** @var array<string, mixed> $section */
        return $section;
    }
}
