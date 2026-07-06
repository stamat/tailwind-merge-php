<?php

declare(strict_types=1);

namespace Stamat\TailwindMerge;

/**
 * Splits a class name into variant modifiers, important modifier, base class
 * name and postfix modifier position.
 *
 * Port of tailwind-merge v3 `parse-class-name.ts` + `sort-modifiers.ts`.
 */
final class Parser
{
    public const IMPORTANT_MODIFIER = '!';

    private const MODIFIER_SEPARATOR = ':';

    private readonly ?string $fullPrefix;

    /** @var array<string, true> */
    private readonly array $orderSensitiveModifiers;

    /**
     * @param  array<string, mixed>  $config
     */
    public function __construct(array $config)
    {
        $prefix = $config['prefix'] ?? null;
        $this->fullPrefix = is_string($prefix) && $prefix !== '' ? $prefix . self::MODIFIER_SEPARATOR : null;

        $orderSensitive = [];

        if (is_array($config['orderSensitiveModifiers'] ?? null)) {
            foreach ($config['orderSensitiveModifiers'] as $modifier) {
                if (is_string($modifier)) {
                    $orderSensitive[$modifier] = true;
                }
            }
        }

        $this->orderSensitiveModifiers = $orderSensitive;
    }

    /**
     * @return array{modifiers: list<string>, hasImportantModifier: bool, baseClassName: string, maybePostfixModifierPosition: int|null, isExternal: bool}
     */
    public function parse(string $className): array
    {
        if ($this->fullPrefix !== null) {
            if (! str_starts_with($className, $this->fullPrefix)) {
                return [
                    'modifiers' => [],
                    'hasImportantModifier' => false,
                    'baseClassName' => $className,
                    'maybePostfixModifierPosition' => null,
                    'isExternal' => true,
                ];
            }

            $className = substr($className, strlen($this->fullPrefix));
        }

        $modifiers = [];
        $bracketDepth = 0;
        $parenDepth = 0;
        $modifierStart = 0;
        $postfixModifierPosition = null;

        $length = strlen($className);

        for ($index = 0; $index < $length; $index++) {
            $character = $className[$index];

            if ($bracketDepth === 0 && $parenDepth === 0) {
                if ($character === self::MODIFIER_SEPARATOR) {
                    $modifiers[] = substr($className, $modifierStart, $index - $modifierStart);
                    $modifierStart = $index + 1;

                    continue;
                }

                if ($character === '/') {
                    $postfixModifierPosition = $index;

                    continue;
                }
            }

            if ($character === '[') {
                $bracketDepth++;
            } elseif ($character === ']') {
                $bracketDepth--;
            } elseif ($character === '(') {
                $parenDepth++;
            } elseif ($character === ')') {
                $parenDepth--;
            }
        }

        $baseClassNameWithImportantModifier = $modifiers === [] ? $className : substr($className, $modifierStart);

        $hasImportantModifier = false;
        $baseClassName = $baseClassNameWithImportantModifier;

        if (str_ends_with($baseClassNameWithImportantModifier, self::IMPORTANT_MODIFIER)) {
            $baseClassName = substr($baseClassNameWithImportantModifier, 0, -1);
            $hasImportantModifier = true;
        } elseif (str_starts_with($baseClassNameWithImportantModifier, self::IMPORTANT_MODIFIER)) {
            // In Tailwind CSS v3 the important modifier was at the start of the
            // base class name. Still supported for legacy reasons.
            // @see https://github.com/dcastil/tailwind-merge/issues/513
            $baseClassName = substr($baseClassNameWithImportantModifier, 1);
            $hasImportantModifier = true;
        }

        $maybePostfixModifierPosition = $postfixModifierPosition !== null && $postfixModifierPosition > $modifierStart
            ? $postfixModifierPosition - $modifierStart
            : null;

        return [
            'modifiers' => $modifiers,
            'hasImportantModifier' => $hasImportantModifier,
            'baseClassName' => $baseClassName,
            'maybePostfixModifierPosition' => $maybePostfixModifierPosition,
            'isExternal' => false,
        ];
    }

    /**
     * Sorts modifiers according to the following schema:
     * - Predefined modifiers are sorted alphabetically
     * - When an arbitrary or order-sensitive variant appears, the modifiers
     *   before and after it keep their relative position
     *
     * @param  list<string>  $modifiers
     * @return list<string>
     */
    public function sortModifiers(array $modifiers): array
    {
        $result = [];
        $currentSegment = [];

        foreach ($modifiers as $modifier) {
            $isArbitrary = ($modifier[0] ?? '') === '[';

            if ($isArbitrary || isset($this->orderSensitiveModifiers[$modifier])) {
                if ($currentSegment !== []) {
                    sort($currentSegment);
                    array_push($result, ...$currentSegment);
                    $currentSegment = [];
                }

                $result[] = $modifier;
            } else {
                $currentSegment[] = $modifier;
            }
        }

        if ($currentSegment !== []) {
            sort($currentSegment);
            array_push($result, ...$currentSegment);
        }

        return $result;
    }
}
