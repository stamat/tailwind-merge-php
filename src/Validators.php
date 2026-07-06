<?php

declare(strict_types=1);

namespace Stamat\TailwindMerge;

/**
 * Value validators used by the default config, ported from tailwind-merge v3
 * `validators.ts`. All methods are pure and side-effect free.
 */
final class Validators
{
    // `D` modifier everywhere an anchor is used: PCRE `$` matches before a trailing
    // newline by default, JS `$` does not — parity with upstream requires strict `$`.
    private const ARBITRARY_VALUE_REGEX = '/^\[(?:(\w[\w-]*):)?(.+)\]$/iD';

    private const ARBITRARY_VARIABLE_REGEX = '/^\((?:(\w[\w-]*):)?(.+)\)$/iD';

    private const FRACTION_REGEX = '/^\d+(?:\.\d+)?\/\d+(?:\.\d+)?$/D';

    private const TSHIRT_UNIT_REGEX = '/^(\d+(\.\d+)?)?(xs|sm|md|lg|xl)$/D';

    private const LENGTH_UNIT_REGEX = '/\d+(%|px|r?em|[sdl]?v([hwib]|min|max)|pt|pc|in|cm|mm|cap|ch|ex|r?lh|cq(w|h|i|b|min|max))|\b(calc|min|max|clamp)\(.+\)|^0$/D';

    private const COLOR_FUNCTION_REGEX = '/^(rgba?|hsla?|hwb|(ok)?(lab|lch)|color-mix)\(.+\)$/D';

    // Shadow always begins with x and y offset separated by underscore, optionally prepended by inset
    private const SHADOW_REGEX = '/^(inset_)?-?((\d+)?\.?(\d+)[a-z]+|0)_-?((\d+)?\.?(\d+)[a-z]+|0)/';

    private const IMAGE_REGEX = '/^(url|image|image-set|cross-fade|element|(repeating-)?(linear|radial|conic)-gradient)\(.+\)$/D';

    public static function isFraction(string $value): bool
    {
        return preg_match(self::FRACTION_REGEX, $value) === 1;
    }

    public static function isNumber(string $value): bool
    {
        return is_numeric($value);
    }

    public static function isInteger(string $value): bool
    {
        return is_numeric($value) && (float) $value === floor((float) $value);
    }

    public static function isPercent(string $value): bool
    {
        return str_ends_with($value, '%') && self::isNumber(substr($value, 0, -1));
    }

    public static function isTshirtSize(string $value): bool
    {
        return preg_match(self::TSHIRT_UNIT_REGEX, $value) === 1;
    }

    public static function isAny(string $value = ''): bool
    {
        return true;
    }

    public static function isAnyNonArbitrary(string $value): bool
    {
        return ! self::isArbitraryValue($value) && ! self::isArbitraryVariable($value);
    }

    public static function isNamedContainerQuery(string $value): bool
    {
        if (! str_starts_with($value, '@container')) {
            return false;
        }

        return (($value[10] ?? null) === '/' && isset($value[11]))
            || (($value[11] ?? null) === 's' && isset($value[16]) && substr($value, 10, 6) === '-size/')
            || (($value[11] ?? null) === 'n' && isset($value[18]) && substr($value, 10, 8) === '-normal/');
    }

    public static function isArbitraryValue(string $value): bool
    {
        return preg_match(self::ARBITRARY_VALUE_REGEX, $value) === 1;
    }

    public static function isArbitraryVariable(string $value): bool
    {
        return preg_match(self::ARBITRARY_VARIABLE_REGEX, $value) === 1;
    }

    public static function isArbitrarySize(string $value): bool
    {
        return self::getIsArbitraryValue($value, self::isLabelSize(...), self::isNever(...));
    }

    public static function isArbitraryLength(string $value): bool
    {
        return self::getIsArbitraryValue($value, self::isLabelLength(...), self::isLengthOnly(...));
    }

    public static function isArbitraryNumber(string $value): bool
    {
        return self::getIsArbitraryValue($value, self::isLabelNumber(...), self::isNumber(...));
    }

    public static function isArbitraryWeight(string $value): bool
    {
        return self::getIsArbitraryValue($value, self::isLabelWeight(...), self::isAny(...));
    }

    public static function isArbitraryFamilyName(string $value): bool
    {
        return self::getIsArbitraryValue($value, self::isLabelFamilyName(...), self::isNever(...));
    }

    public static function isArbitraryPosition(string $value): bool
    {
        return self::getIsArbitraryValue($value, self::isLabelPosition(...), self::isNever(...));
    }

    public static function isArbitraryImage(string $value): bool
    {
        return self::getIsArbitraryValue($value, self::isLabelImage(...), self::isImage(...));
    }

    public static function isArbitraryShadow(string $value): bool
    {
        return self::getIsArbitraryValue($value, self::isLabelShadow(...), self::isShadow(...));
    }

    public static function isArbitraryVariableLength(string $value): bool
    {
        return self::getIsArbitraryVariable($value, self::isLabelLength(...));
    }

    public static function isArbitraryVariableFamilyName(string $value): bool
    {
        return self::getIsArbitraryVariable($value, self::isLabelFamilyName(...));
    }

    public static function isArbitraryVariablePosition(string $value): bool
    {
        return self::getIsArbitraryVariable($value, self::isLabelPosition(...));
    }

    public static function isArbitraryVariableSize(string $value): bool
    {
        return self::getIsArbitraryVariable($value, self::isLabelSize(...));
    }

    public static function isArbitraryVariableImage(string $value): bool
    {
        return self::getIsArbitraryVariable($value, self::isLabelImage(...));
    }

    public static function isArbitraryVariableShadow(string $value): bool
    {
        return self::getIsArbitraryVariable($value, self::isLabelShadow(...), true);
    }

    public static function isArbitraryVariableWeight(string $value): bool
    {
        return self::getIsArbitraryVariable($value, self::isLabelWeight(...), true);
    }

    // Helpers

    /**
     * @param  callable(string): bool  $testLabel
     * @param  callable(string): bool  $testValue
     */
    private static function getIsArbitraryValue(string $value, callable $testLabel, callable $testValue): bool
    {
        if (preg_match(self::ARBITRARY_VALUE_REGEX, $value, $matches) !== 1) {
            return false;
        }

        if ($matches[1] !== '') {
            return $testLabel($matches[1]);
        }

        return $testValue($matches[2]);
    }

    /**
     * @param  callable(string): bool  $testLabel
     */
    private static function getIsArbitraryVariable(string $value, callable $testLabel, bool $shouldMatchNoLabel = false): bool
    {
        if (preg_match(self::ARBITRARY_VARIABLE_REGEX, $value, $matches) !== 1) {
            return false;
        }

        if ($matches[1] !== '') {
            return $testLabel($matches[1]);
        }

        return $shouldMatchNoLabel;
    }

    private static function isLengthOnly(string $value): bool
    {
        // COLOR_FUNCTION_REGEX check is necessary because color functions can have percentages
        // in them which would be incorrectly classified as lengths, e.g. `hsl(0 0% 0%)`.
        return preg_match(self::LENGTH_UNIT_REGEX, $value) === 1
            && preg_match(self::COLOR_FUNCTION_REGEX, $value) !== 1;
    }

    private static function isNever(string $value): bool
    {
        return false;
    }

    private static function isShadow(string $value): bool
    {
        return preg_match(self::SHADOW_REGEX, $value) === 1;
    }

    private static function isImage(string $value): bool
    {
        return preg_match(self::IMAGE_REGEX, $value) === 1;
    }

    // Labels

    private static function isLabelPosition(string $label): bool
    {
        return $label === 'position' || $label === 'percentage';
    }

    private static function isLabelImage(string $label): bool
    {
        return $label === 'image' || $label === 'url';
    }

    private static function isLabelSize(string $label): bool
    {
        return $label === 'length' || $label === 'size' || $label === 'bg-size';
    }

    private static function isLabelLength(string $label): bool
    {
        return $label === 'length';
    }

    private static function isLabelNumber(string $label): bool
    {
        return $label === 'number';
    }

    private static function isLabelFamilyName(string $label): bool
    {
        return $label === 'family-name';
    }

    private static function isLabelWeight(string $label): bool
    {
        return $label === 'number' || $label === 'weight';
    }

    private static function isLabelShadow(string $label): bool
    {
        return $label === 'shadow';
    }
}
