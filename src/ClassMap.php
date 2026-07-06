<?php

declare(strict_types=1);

namespace Stamat\TailwindMerge;

/**
 * Class-map trie: resolves a base class name to its class group id and
 * exposes conflict lookups. Built once per TailwindMerge instance.
 *
 * Port of tailwind-merge v3 `class-group-utils.ts`.
 */
final class ClassMap
{
    private const CLASS_PART_SEPARATOR = '-';

    // Two dots because one dot is used as prefix for class groups in plugins
    private const ARBITRARY_PROPERTY_PREFIX = 'arbitrary..';

    private readonly ClassPartNode $root;

    /** @var array<string, list<string>> */
    private readonly array $conflictingClassGroups;

    /** @var array<string, list<string>> */
    private readonly array $conflictingClassGroupModifiers;

    /** @var array<string, true> */
    private readonly array $postfixLookupClassGroupIds;

    /**
     * @param  array<string, mixed>  $config
     */
    public function __construct(array $config)
    {
        $theme = is_array($config['theme'] ?? null) ? $config['theme'] : [];
        $classGroups = is_array($config['classGroups'] ?? null) ? $config['classGroups'] : [];

        $root = new ClassPartNode();

        foreach ($classGroups as $classGroupId => $classGroup) {
            if (! is_array($classGroup)) {
                continue;
            }

            self::processClassesRecursively($classGroup, $root, (string) $classGroupId, $theme);
        }

        $this->root = $root;

        /** @var array<string, list<string>> $conflicting */
        $conflicting = is_array($config['conflictingClassGroups'] ?? null) ? $config['conflictingClassGroups'] : [];
        $this->conflictingClassGroups = $conflicting;

        /** @var array<string, list<string>> $conflictingModifiers */
        $conflictingModifiers = is_array($config['conflictingClassGroupModifiers'] ?? null) ? $config['conflictingClassGroupModifiers'] : [];
        $this->conflictingClassGroupModifiers = $conflictingModifiers;

        $postfixLookup = [];

        if (is_array($config['postfixLookupClassGroups'] ?? null)) {
            foreach ($config['postfixLookupClassGroups'] as $classGroupId) {
                if (is_string($classGroupId)) {
                    $postfixLookup[$classGroupId] = true;
                }
            }
        }

        $this->postfixLookupClassGroupIds = $postfixLookup;
    }

    public function getClassGroupId(string $className): ?string
    {
        if (str_starts_with($className, '[') && str_ends_with($className, ']')) {
            return self::getGroupIdForArbitraryProperty($className);
        }

        $classParts = explode(self::CLASS_PART_SEPARATOR, $className);

        // Classes like `-inset-1` produce an empty string as first class part.
        // We assume classes for negative values are used correctly and skip it.
        $startIndex = $classParts[0] === '' && count($classParts) > 1 ? 1 : 0;

        return self::getGroupRecursive($classParts, $startIndex, $this->root);
    }

    public function hasPostfixLookup(string $classGroupId): bool
    {
        return isset($this->postfixLookupClassGroupIds[$classGroupId]);
    }

    /**
     * @return list<string>
     */
    public function getConflictingClassGroupIds(string $classGroupId, bool $hasPostfixModifier): array
    {
        $baseConflicts = $this->conflictingClassGroups[$classGroupId] ?? [];

        if ($hasPostfixModifier) {
            $modifierConflicts = $this->conflictingClassGroupModifiers[$classGroupId] ?? [];

            if ($modifierConflicts !== []) {
                return [...$baseConflicts, ...$modifierConflicts];
            }
        }

        return $baseConflicts;
    }

    /**
     * @param  list<string>  $classParts
     */
    private static function getGroupRecursive(array $classParts, int $startIndex, ClassPartNode $node): ?string
    {
        if ($startIndex >= count($classParts)) {
            return $node->classGroupId;
        }

        $next = $node->nextPart[$classParts[$startIndex]] ?? null;

        if ($next !== null) {
            $result = self::getGroupRecursive($classParts, $startIndex + 1, $next);

            if ($result !== null) {
                return $result;
            }
        }

        if ($node->validators === []) {
            return null;
        }

        $classRest = $startIndex === 0
            ? implode(self::CLASS_PART_SEPARATOR, $classParts)
            : implode(self::CLASS_PART_SEPARATOR, array_slice($classParts, $startIndex));

        foreach ($node->validators as $validatorObject) {
            if (($validatorObject['validator'])($classRest)) {
                return $validatorObject['classGroupId'];
            }
        }

        return null;
    }

    /**
     * Expects a class name starting with `[` and ending with `]`.
     */
    private static function getGroupIdForArbitraryProperty(string $className): ?string
    {
        $content = substr($className, 1, -1);
        $colonIndex = strpos($content, ':');

        if ($colonIndex === false || $colonIndex === 0) {
            return null;
        }

        return self::ARBITRARY_PROPERTY_PREFIX . substr($content, 0, $colonIndex);
    }

    /**
     * @param  array<array-key, mixed>  $classGroup
     * @param  array<array-key, mixed>  $theme
     */
    private static function processClassesRecursively(array $classGroup, ClassPartNode $node, string $classGroupId, array $theme): void
    {
        foreach ($classGroup as $classDefinition) {
            if (is_string($classDefinition)) {
                $target = $classDefinition === '' ? $node : self::getPart($node, $classDefinition);
                $target->classGroupId = $classGroupId;

                continue;
            }

            if ($classDefinition instanceof ThemeRef) {
                $scale = $theme[$classDefinition->key] ?? [];

                if (is_array($scale)) {
                    self::processClassesRecursively($scale, $node, $classGroupId, $theme);
                }

                continue;
            }

            if (is_callable($classDefinition)) {
                $node->validators[] = [
                    'classGroupId' => $classGroupId,
                    'validator' => $classDefinition,
                ];

                continue;
            }

            if (is_array($classDefinition)) {
                foreach ($classDefinition as $key => $nestedClassGroup) {
                    if (is_array($nestedClassGroup)) {
                        self::processClassesRecursively($nestedClassGroup, self::getPart($node, (string) $key), $classGroupId, $theme);
                    }
                }
            }
        }
    }

    private static function getPart(ClassPartNode $node, string $path): ClassPartNode
    {
        foreach (explode(self::CLASS_PART_SEPARATOR, $path) as $pathPart) {
            $node = $node->nextPart[$pathPart] ??= new ClassPartNode();
        }

        return $node;
    }
}
