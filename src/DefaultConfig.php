<?php

declare(strict_types=1);

namespace Stamat\TailwindMerge;

/**
 * Default Tailwind CSS v4 configuration.
 *
 * GENERATED FILE — do not edit by hand.
 * Regenerate from the upstream JS package with bin/generate-default-config.mjs
 * (source of truth: dcastil/tailwind-merge v3.6.0).
 */
final class DefaultConfig
{
    /**
     * @return array{cacheSize: int, theme: array<string, list<mixed>>, classGroups: array<string, list<mixed>>, conflictingClassGroups: array<string, list<string>>, conflictingClassGroupModifiers: array<string, list<string>>, postfixLookupClassGroups: list<string>, orderSensitiveModifiers: list<string>}
     */
    public static function config(): array
    {
        // Memoized: the literal rebuilds thousands of first-class-callable Closures per call.
        // Callers mutate only their own copy (PHP arrays are copy-on-write), so sharing is safe.
        /** @var array{cacheSize: int, theme: array<string, list<mixed>>, classGroups: array<string, list<mixed>>, conflictingClassGroups: array<string, list<string>>, conflictingClassGroupModifiers: array<string, list<string>>, postfixLookupClassGroups: list<string>, orderSensitiveModifiers: list<string>}|null $config */
        static $config = null;

        return $config ??= [
            'cacheSize' => 500,
            'theme' => [
                'animate' => [
                    'spin',
                    'ping',
                    'pulse',
                    'bounce',
                ],
                'aspect' => [
                    'video',
                ],
                'blur' => [
                    Validators::isTshirtSize(...),
                ],
                'breakpoint' => [
                    Validators::isTshirtSize(...),
                ],
                'color' => [
                    Validators::isAny(...),
                ],
                'container' => [
                    Validators::isTshirtSize(...),
                ],
                'drop-shadow' => [
                    Validators::isTshirtSize(...),
                ],
                'ease' => [
                    'in',
                    'out',
                    'in-out',
                ],
                'font' => [
                    Validators::isAnyNonArbitrary(...),
                ],
                'font-weight' => [
                    'thin',
                    'extralight',
                    'light',
                    'normal',
                    'medium',
                    'semibold',
                    'bold',
                    'extrabold',
                    'black',
                ],
                'inset-shadow' => [
                    Validators::isTshirtSize(...),
                ],
                'leading' => [
                    'none',
                    'tight',
                    'snug',
                    'normal',
                    'relaxed',
                    'loose',
                ],
                'perspective' => [
                    'dramatic',
                    'near',
                    'normal',
                    'midrange',
                    'distant',
                    'none',
                ],
                'radius' => [
                    Validators::isTshirtSize(...),
                ],
                'shadow' => [
                    Validators::isTshirtSize(...),
                ],
                'spacing' => [
                    'px',
                    Validators::isNumber(...),
                ],
                'text' => [
                    Validators::isTshirtSize(...),
                ],
                'text-shadow' => [
                    Validators::isTshirtSize(...),
                ],
                'tracking' => [
                    'tighter',
                    'tight',
                    'normal',
                    'wide',
                    'wider',
                    'widest',
                ],
            ],
            'classGroups' => [
                'aspect' => [
                    [
                        'aspect' => [
                            'auto',
                            'square',
                            Validators::isFraction(...),
                            Validators::isArbitraryValue(...),
                            Validators::isArbitraryVariable(...),
                            new ThemeRef('aspect'),
                        ],
                    ],
                ],
                'container' => [
                    'container',
                ],
                'container-type' => [
                    [
                        '@container' => [
                            '',
                            'normal',
                            'size',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'container-named' => [
                    Validators::isNamedContainerQuery(...),
                ],
                'columns' => [
                    [
                        'columns' => [
                            Validators::isNumber(...),
                            Validators::isArbitraryValue(...),
                            Validators::isArbitraryVariable(...),
                            new ThemeRef('container'),
                        ],
                    ],
                ],
                'break-after' => [
                    [
                        'break-after' => [
                            'auto',
                            'avoid',
                            'all',
                            'avoid-page',
                            'page',
                            'left',
                            'right',
                            'column',
                        ],
                    ],
                ],
                'break-before' => [
                    [
                        'break-before' => [
                            'auto',
                            'avoid',
                            'all',
                            'avoid-page',
                            'page',
                            'left',
                            'right',
                            'column',
                        ],
                    ],
                ],
                'break-inside' => [
                    [
                        'break-inside' => [
                            'auto',
                            'avoid',
                            'avoid-page',
                            'avoid-column',
                        ],
                    ],
                ],
                'box-decoration' => [
                    [
                        'box-decoration' => [
                            'slice',
                            'clone',
                        ],
                    ],
                ],
                'box' => [
                    [
                        'box' => [
                            'border',
                            'content',
                        ],
                    ],
                ],
                'display' => [
                    'block',
                    'inline-block',
                    'inline',
                    'flex',
                    'inline-flex',
                    'table',
                    'inline-table',
                    'table-caption',
                    'table-cell',
                    'table-column',
                    'table-column-group',
                    'table-footer-group',
                    'table-header-group',
                    'table-row-group',
                    'table-row',
                    'flow-root',
                    'grid',
                    'inline-grid',
                    'contents',
                    'list-item',
                    'hidden',
                ],
                'sr' => [
                    'sr-only',
                    'not-sr-only',
                ],
                'float' => [
                    [
                        'float' => [
                            'right',
                            'left',
                            'none',
                            'start',
                            'end',
                        ],
                    ],
                ],
                'clear' => [
                    [
                        'clear' => [
                            'left',
                            'right',
                            'both',
                            'none',
                            'start',
                            'end',
                        ],
                    ],
                ],
                'isolation' => [
                    'isolate',
                    'isolation-auto',
                ],
                'object-fit' => [
                    [
                        'object' => [
                            'contain',
                            'cover',
                            'fill',
                            'none',
                            'scale-down',
                        ],
                    ],
                ],
                'object-position' => [
                    [
                        'object' => [
                            'center',
                            'top',
                            'bottom',
                            'left',
                            'right',
                            'top-left',
                            'left-top',
                            'top-right',
                            'right-top',
                            'bottom-right',
                            'right-bottom',
                            'bottom-left',
                            'left-bottom',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'overflow' => [
                    [
                        'overflow' => [
                            'auto',
                            'hidden',
                            'clip',
                            'visible',
                            'scroll',
                        ],
                    ],
                ],
                'overflow-x' => [
                    [
                        'overflow-x' => [
                            'auto',
                            'hidden',
                            'clip',
                            'visible',
                            'scroll',
                        ],
                    ],
                ],
                'overflow-y' => [
                    [
                        'overflow-y' => [
                            'auto',
                            'hidden',
                            'clip',
                            'visible',
                            'scroll',
                        ],
                    ],
                ],
                'overscroll' => [
                    [
                        'overscroll' => [
                            'auto',
                            'contain',
                            'none',
                        ],
                    ],
                ],
                'overscroll-x' => [
                    [
                        'overscroll-x' => [
                            'auto',
                            'contain',
                            'none',
                        ],
                    ],
                ],
                'overscroll-y' => [
                    [
                        'overscroll-y' => [
                            'auto',
                            'contain',
                            'none',
                        ],
                    ],
                ],
                'position' => [
                    'static',
                    'fixed',
                    'absolute',
                    'relative',
                    'sticky',
                ],
                'inset' => [
                    [
                        'inset' => [
                            Validators::isFraction(...),
                            'full',
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'inset-x' => [
                    [
                        'inset-x' => [
                            Validators::isFraction(...),
                            'full',
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'inset-y' => [
                    [
                        'inset-y' => [
                            Validators::isFraction(...),
                            'full',
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'start' => [
                    [
                        'inset-s' => [
                            Validators::isFraction(...),
                            'full',
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                        'start' => [
                            Validators::isFraction(...),
                            'full',
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'end' => [
                    [
                        'inset-e' => [
                            Validators::isFraction(...),
                            'full',
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                        'end' => [
                            Validators::isFraction(...),
                            'full',
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'inset-bs' => [
                    [
                        'inset-bs' => [
                            Validators::isFraction(...),
                            'full',
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'inset-be' => [
                    [
                        'inset-be' => [
                            Validators::isFraction(...),
                            'full',
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'top' => [
                    [
                        'top' => [
                            Validators::isFraction(...),
                            'full',
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'right' => [
                    [
                        'right' => [
                            Validators::isFraction(...),
                            'full',
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'bottom' => [
                    [
                        'bottom' => [
                            Validators::isFraction(...),
                            'full',
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'left' => [
                    [
                        'left' => [
                            Validators::isFraction(...),
                            'full',
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'visibility' => [
                    'visible',
                    'invisible',
                    'collapse',
                ],
                'z' => [
                    [
                        'z' => [
                            Validators::isInteger(...),
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'basis' => [
                    [
                        'basis' => [
                            Validators::isFraction(...),
                            'full',
                            'auto',
                            new ThemeRef('container'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'flex-direction' => [
                    [
                        'flex' => [
                            'row',
                            'row-reverse',
                            'col',
                            'col-reverse',
                        ],
                    ],
                ],
                'flex-wrap' => [
                    [
                        'flex' => [
                            'nowrap',
                            'wrap',
                            'wrap-reverse',
                        ],
                    ],
                ],
                'flex' => [
                    [
                        'flex' => [
                            Validators::isNumber(...),
                            Validators::isFraction(...),
                            'auto',
                            'initial',
                            'none',
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'grow' => [
                    [
                        'grow' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'shrink' => [
                    [
                        'shrink' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'order' => [
                    [
                        'order' => [
                            Validators::isInteger(...),
                            'first',
                            'last',
                            'none',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'grid-cols' => [
                    [
                        'grid-cols' => [
                            Validators::isInteger(...),
                            'none',
                            'subgrid',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'col-start-end' => [
                    [
                        'col' => [
                            'auto',
                            [
                                'span' => [
                                    'full',
                                    Validators::isInteger(...),
                                    Validators::isArbitraryVariable(...),
                                    Validators::isArbitraryValue(...),
                                ],
                            ],
                            Validators::isInteger(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'col-start' => [
                    [
                        'col-start' => [
                            Validators::isInteger(...),
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'col-end' => [
                    [
                        'col-end' => [
                            Validators::isInteger(...),
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'grid-rows' => [
                    [
                        'grid-rows' => [
                            Validators::isInteger(...),
                            'none',
                            'subgrid',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'row-start-end' => [
                    [
                        'row' => [
                            'auto',
                            [
                                'span' => [
                                    'full',
                                    Validators::isInteger(...),
                                    Validators::isArbitraryVariable(...),
                                    Validators::isArbitraryValue(...),
                                ],
                            ],
                            Validators::isInteger(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'row-start' => [
                    [
                        'row-start' => [
                            Validators::isInteger(...),
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'row-end' => [
                    [
                        'row-end' => [
                            Validators::isInteger(...),
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'grid-flow' => [
                    [
                        'grid-flow' => [
                            'row',
                            'col',
                            'dense',
                            'row-dense',
                            'col-dense',
                        ],
                    ],
                ],
                'auto-cols' => [
                    [
                        'auto-cols' => [
                            'auto',
                            'min',
                            'max',
                            'fr',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'auto-rows' => [
                    [
                        'auto-rows' => [
                            'auto',
                            'min',
                            'max',
                            'fr',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'gap' => [
                    [
                        'gap' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'gap-x' => [
                    [
                        'gap-x' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'gap-y' => [
                    [
                        'gap-y' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'justify-content' => [
                    [
                        'justify' => [
                            'start',
                            'end',
                            'center',
                            'between',
                            'around',
                            'evenly',
                            'stretch',
                            'baseline',
                            'center-safe',
                            'end-safe',
                            'normal',
                        ],
                    ],
                ],
                'justify-items' => [
                    [
                        'justify-items' => [
                            'start',
                            'end',
                            'center',
                            'stretch',
                            'center-safe',
                            'end-safe',
                            'normal',
                        ],
                    ],
                ],
                'justify-self' => [
                    [
                        'justify-self' => [
                            'auto',
                            'start',
                            'end',
                            'center',
                            'stretch',
                            'center-safe',
                            'end-safe',
                        ],
                    ],
                ],
                'align-content' => [
                    [
                        'content' => [
                            'normal',
                            'start',
                            'end',
                            'center',
                            'between',
                            'around',
                            'evenly',
                            'stretch',
                            'baseline',
                            'center-safe',
                            'end-safe',
                        ],
                    ],
                ],
                'align-items' => [
                    [
                        'items' => [
                            'start',
                            'end',
                            'center',
                            'stretch',
                            'center-safe',
                            'end-safe',
                            [
                                'baseline' => [
                                    '',
                                    'last',
                                ],
                            ],
                        ],
                    ],
                ],
                'align-self' => [
                    [
                        'self' => [
                            'auto',
                            'start',
                            'end',
                            'center',
                            'stretch',
                            'center-safe',
                            'end-safe',
                            [
                                'baseline' => [
                                    '',
                                    'last',
                                ],
                            ],
                        ],
                    ],
                ],
                'place-content' => [
                    [
                        'place-content' => [
                            'start',
                            'end',
                            'center',
                            'between',
                            'around',
                            'evenly',
                            'stretch',
                            'baseline',
                            'center-safe',
                            'end-safe',
                        ],
                    ],
                ],
                'place-items' => [
                    [
                        'place-items' => [
                            'start',
                            'end',
                            'center',
                            'stretch',
                            'center-safe',
                            'end-safe',
                            'baseline',
                        ],
                    ],
                ],
                'place-self' => [
                    [
                        'place-self' => [
                            'auto',
                            'start',
                            'end',
                            'center',
                            'stretch',
                            'center-safe',
                            'end-safe',
                        ],
                    ],
                ],
                'p' => [
                    [
                        'p' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'px' => [
                    [
                        'px' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'py' => [
                    [
                        'py' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'ps' => [
                    [
                        'ps' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'pe' => [
                    [
                        'pe' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'pbs' => [
                    [
                        'pbs' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'pbe' => [
                    [
                        'pbe' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'pt' => [
                    [
                        'pt' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'pr' => [
                    [
                        'pr' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'pb' => [
                    [
                        'pb' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'pl' => [
                    [
                        'pl' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'm' => [
                    [
                        'm' => [
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'mx' => [
                    [
                        'mx' => [
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'my' => [
                    [
                        'my' => [
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'ms' => [
                    [
                        'ms' => [
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'me' => [
                    [
                        'me' => [
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'mbs' => [
                    [
                        'mbs' => [
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'mbe' => [
                    [
                        'mbe' => [
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'mt' => [
                    [
                        'mt' => [
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'mr' => [
                    [
                        'mr' => [
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'mb' => [
                    [
                        'mb' => [
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'ml' => [
                    [
                        'ml' => [
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'space-x' => [
                    [
                        'space-x' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'space-x-reverse' => [
                    'space-x-reverse',
                ],
                'space-y' => [
                    [
                        'space-y' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'space-y-reverse' => [
                    'space-y-reverse',
                ],
                'size' => [
                    [
                        'size' => [
                            Validators::isFraction(...),
                            'auto',
                            'full',
                            'dvw',
                            'dvh',
                            'lvw',
                            'lvh',
                            'svw',
                            'svh',
                            'min',
                            'max',
                            'fit',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'inline-size' => [
                    [
                        'inline' => [
                            'auto',
                            Validators::isFraction(...),
                            'screen',
                            'full',
                            'dvw',
                            'lvw',
                            'svw',
                            'min',
                            'max',
                            'fit',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'min-inline-size' => [
                    [
                        'min-inline' => [
                            'auto',
                            Validators::isFraction(...),
                            'screen',
                            'full',
                            'dvw',
                            'lvw',
                            'svw',
                            'min',
                            'max',
                            'fit',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'max-inline-size' => [
                    [
                        'max-inline' => [
                            'none',
                            Validators::isFraction(...),
                            'screen',
                            'full',
                            'dvw',
                            'lvw',
                            'svw',
                            'min',
                            'max',
                            'fit',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'block-size' => [
                    [
                        'block' => [
                            'auto',
                            Validators::isFraction(...),
                            'screen',
                            'full',
                            'lh',
                            'dvh',
                            'lvh',
                            'svh',
                            'min',
                            'max',
                            'fit',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'min-block-size' => [
                    [
                        'min-block' => [
                            'auto',
                            Validators::isFraction(...),
                            'screen',
                            'full',
                            'lh',
                            'dvh',
                            'lvh',
                            'svh',
                            'min',
                            'max',
                            'fit',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'max-block-size' => [
                    [
                        'max-block' => [
                            'none',
                            Validators::isFraction(...),
                            'screen',
                            'full',
                            'lh',
                            'dvh',
                            'lvh',
                            'svh',
                            'min',
                            'max',
                            'fit',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'w' => [
                    [
                        'w' => [
                            new ThemeRef('container'),
                            'screen',
                            Validators::isFraction(...),
                            'auto',
                            'full',
                            'dvw',
                            'dvh',
                            'lvw',
                            'lvh',
                            'svw',
                            'svh',
                            'min',
                            'max',
                            'fit',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'min-w' => [
                    [
                        'min-w' => [
                            new ThemeRef('container'),
                            'screen',
                            'none',
                            Validators::isFraction(...),
                            'auto',
                            'full',
                            'dvw',
                            'dvh',
                            'lvw',
                            'lvh',
                            'svw',
                            'svh',
                            'min',
                            'max',
                            'fit',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'max-w' => [
                    [
                        'max-w' => [
                            new ThemeRef('container'),
                            'screen',
                            'none',
                            'prose',
                            [
                                'screen' => [
                                    new ThemeRef('breakpoint'),
                                ],
                            ],
                            Validators::isFraction(...),
                            'auto',
                            'full',
                            'dvw',
                            'dvh',
                            'lvw',
                            'lvh',
                            'svw',
                            'svh',
                            'min',
                            'max',
                            'fit',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'h' => [
                    [
                        'h' => [
                            'screen',
                            'lh',
                            Validators::isFraction(...),
                            'auto',
                            'full',
                            'dvw',
                            'dvh',
                            'lvw',
                            'lvh',
                            'svw',
                            'svh',
                            'min',
                            'max',
                            'fit',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'min-h' => [
                    [
                        'min-h' => [
                            'screen',
                            'lh',
                            'none',
                            Validators::isFraction(...),
                            'auto',
                            'full',
                            'dvw',
                            'dvh',
                            'lvw',
                            'lvh',
                            'svw',
                            'svh',
                            'min',
                            'max',
                            'fit',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'max-h' => [
                    [
                        'max-h' => [
                            'screen',
                            'lh',
                            Validators::isFraction(...),
                            'auto',
                            'full',
                            'dvw',
                            'dvh',
                            'lvw',
                            'lvh',
                            'svw',
                            'svh',
                            'min',
                            'max',
                            'fit',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'font-size' => [
                    [
                        'text' => [
                            'base',
                            new ThemeRef('text'),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'font-smoothing' => [
                    'antialiased',
                    'subpixel-antialiased',
                ],
                'font-style' => [
                    'italic',
                    'not-italic',
                ],
                'font-weight' => [
                    [
                        'font' => [
                            new ThemeRef('font-weight'),
                            Validators::isArbitraryVariableWeight(...),
                            Validators::isArbitraryWeight(...),
                        ],
                    ],
                ],
                'font-stretch' => [
                    [
                        'font-stretch' => [
                            'ultra-condensed',
                            'extra-condensed',
                            'condensed',
                            'semi-condensed',
                            'normal',
                            'semi-expanded',
                            'expanded',
                            'extra-expanded',
                            'ultra-expanded',
                            Validators::isPercent(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'font-family' => [
                    [
                        'font' => [
                            Validators::isArbitraryVariableFamilyName(...),
                            Validators::isArbitraryFamilyName(...),
                            new ThemeRef('font'),
                        ],
                    ],
                ],
                'font-features' => [
                    [
                        'font-features' => [
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'fvn-normal' => [
                    'normal-nums',
                ],
                'fvn-ordinal' => [
                    'ordinal',
                ],
                'fvn-slashed-zero' => [
                    'slashed-zero',
                ],
                'fvn-figure' => [
                    'lining-nums',
                    'oldstyle-nums',
                ],
                'fvn-spacing' => [
                    'proportional-nums',
                    'tabular-nums',
                ],
                'fvn-fraction' => [
                    'diagonal-fractions',
                    'stacked-fractions',
                ],
                'tracking' => [
                    [
                        'tracking' => [
                            new ThemeRef('tracking'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'line-clamp' => [
                    [
                        'line-clamp' => [
                            Validators::isNumber(...),
                            'none',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryNumber(...),
                        ],
                    ],
                ],
                'leading' => [
                    [
                        'leading' => [
                            new ThemeRef('leading'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'list-image' => [
                    [
                        'list-image' => [
                            'none',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'list-style-position' => [
                    [
                        'list' => [
                            'inside',
                            'outside',
                        ],
                    ],
                ],
                'list-style-type' => [
                    [
                        'list' => [
                            'disc',
                            'decimal',
                            'none',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'text-alignment' => [
                    [
                        'text' => [
                            'left',
                            'center',
                            'right',
                            'justify',
                            'start',
                            'end',
                        ],
                    ],
                ],
                'placeholder-color' => [
                    [
                        'placeholder' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'text-color' => [
                    [
                        'text' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'text-decoration' => [
                    'underline',
                    'overline',
                    'line-through',
                    'no-underline',
                ],
                'text-decoration-style' => [
                    [
                        'decoration' => [
                            'solid',
                            'dashed',
                            'dotted',
                            'double',
                            'wavy',
                        ],
                    ],
                ],
                'text-decoration-thickness' => [
                    [
                        'decoration' => [
                            Validators::isNumber(...),
                            'from-font',
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'text-decoration-color' => [
                    [
                        'decoration' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'underline-offset' => [
                    [
                        'underline-offset' => [
                            Validators::isNumber(...),
                            'auto',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'text-transform' => [
                    'uppercase',
                    'lowercase',
                    'capitalize',
                    'normal-case',
                ],
                'text-overflow' => [
                    'truncate',
                    'text-ellipsis',
                    'text-clip',
                ],
                'text-wrap' => [
                    [
                        'text' => [
                            'wrap',
                            'nowrap',
                            'balance',
                            'pretty',
                        ],
                    ],
                ],
                'indent' => [
                    [
                        'indent' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'tab-size' => [
                    [
                        'tab' => [
                            Validators::isInteger(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'vertical-align' => [
                    [
                        'align' => [
                            'baseline',
                            'top',
                            'middle',
                            'bottom',
                            'text-top',
                            'text-bottom',
                            'sub',
                            'super',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'whitespace' => [
                    [
                        'whitespace' => [
                            'normal',
                            'nowrap',
                            'pre',
                            'pre-line',
                            'pre-wrap',
                            'break-spaces',
                        ],
                    ],
                ],
                'break' => [
                    [
                        'break' => [
                            'normal',
                            'words',
                            'all',
                            'keep',
                        ],
                    ],
                ],
                'wrap' => [
                    [
                        'wrap' => [
                            'break-word',
                            'anywhere',
                            'normal',
                        ],
                    ],
                ],
                'hyphens' => [
                    [
                        'hyphens' => [
                            'none',
                            'manual',
                            'auto',
                        ],
                    ],
                ],
                'content' => [
                    [
                        'content' => [
                            'none',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'bg-attachment' => [
                    [
                        'bg' => [
                            'fixed',
                            'local',
                            'scroll',
                        ],
                    ],
                ],
                'bg-clip' => [
                    [
                        'bg-clip' => [
                            'border',
                            'padding',
                            'content',
                            'text',
                        ],
                    ],
                ],
                'bg-origin' => [
                    [
                        'bg-origin' => [
                            'border',
                            'padding',
                            'content',
                        ],
                    ],
                ],
                'bg-position' => [
                    [
                        'bg' => [
                            'center',
                            'top',
                            'bottom',
                            'left',
                            'right',
                            'top-left',
                            'left-top',
                            'top-right',
                            'right-top',
                            'bottom-right',
                            'right-bottom',
                            'bottom-left',
                            'left-bottom',
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                            [
                                'position' => [
                                    Validators::isArbitraryVariable(...),
                                    Validators::isArbitraryValue(...),
                                ],
                            ],
                        ],
                    ],
                ],
                'bg-repeat' => [
                    [
                        'bg' => [
                            'no-repeat',
                            [
                                'repeat' => [
                                    '',
                                    'x',
                                    'y',
                                    'space',
                                    'round',
                                ],
                            ],
                        ],
                    ],
                ],
                'bg-size' => [
                    [
                        'bg' => [
                            'auto',
                            'cover',
                            'contain',
                            Validators::isArbitraryVariableSize(...),
                            Validators::isArbitrarySize(...),
                            [
                                'size' => [
                                    Validators::isArbitraryVariable(...),
                                    Validators::isArbitraryValue(...),
                                ],
                            ],
                        ],
                    ],
                ],
                'bg-image' => [
                    [
                        'bg' => [
                            'none',
                            [
                                'linear' => [
                                    [
                                        'to' => [
                                            't',
                                            'tr',
                                            'r',
                                            'br',
                                            'b',
                                            'bl',
                                            'l',
                                            'tl',
                                        ],
                                    ],
                                    Validators::isInteger(...),
                                    Validators::isArbitraryVariable(...),
                                    Validators::isArbitraryValue(...),
                                ],
                                'radial' => [
                                    '',
                                    Validators::isArbitraryVariable(...),
                                    Validators::isArbitraryValue(...),
                                ],
                                'conic' => [
                                    Validators::isInteger(...),
                                    Validators::isArbitraryVariable(...),
                                    Validators::isArbitraryValue(...),
                                ],
                            ],
                            Validators::isArbitraryVariableImage(...),
                            Validators::isArbitraryImage(...),
                        ],
                    ],
                ],
                'bg-color' => [
                    [
                        'bg' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'gradient-from-pos' => [
                    [
                        'from' => [
                            Validators::isPercent(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'gradient-via-pos' => [
                    [
                        'via' => [
                            Validators::isPercent(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'gradient-to-pos' => [
                    [
                        'to' => [
                            Validators::isPercent(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'gradient-from' => [
                    [
                        'from' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'gradient-via' => [
                    [
                        'via' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'gradient-to' => [
                    [
                        'to' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'rounded' => [
                    [
                        'rounded' => [
                            '',
                            'none',
                            'full',
                            new ThemeRef('radius'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'rounded-s' => [
                    [
                        'rounded-s' => [
                            '',
                            'none',
                            'full',
                            new ThemeRef('radius'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'rounded-e' => [
                    [
                        'rounded-e' => [
                            '',
                            'none',
                            'full',
                            new ThemeRef('radius'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'rounded-t' => [
                    [
                        'rounded-t' => [
                            '',
                            'none',
                            'full',
                            new ThemeRef('radius'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'rounded-r' => [
                    [
                        'rounded-r' => [
                            '',
                            'none',
                            'full',
                            new ThemeRef('radius'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'rounded-b' => [
                    [
                        'rounded-b' => [
                            '',
                            'none',
                            'full',
                            new ThemeRef('radius'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'rounded-l' => [
                    [
                        'rounded-l' => [
                            '',
                            'none',
                            'full',
                            new ThemeRef('radius'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'rounded-ss' => [
                    [
                        'rounded-ss' => [
                            '',
                            'none',
                            'full',
                            new ThemeRef('radius'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'rounded-se' => [
                    [
                        'rounded-se' => [
                            '',
                            'none',
                            'full',
                            new ThemeRef('radius'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'rounded-ee' => [
                    [
                        'rounded-ee' => [
                            '',
                            'none',
                            'full',
                            new ThemeRef('radius'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'rounded-es' => [
                    [
                        'rounded-es' => [
                            '',
                            'none',
                            'full',
                            new ThemeRef('radius'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'rounded-tl' => [
                    [
                        'rounded-tl' => [
                            '',
                            'none',
                            'full',
                            new ThemeRef('radius'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'rounded-tr' => [
                    [
                        'rounded-tr' => [
                            '',
                            'none',
                            'full',
                            new ThemeRef('radius'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'rounded-br' => [
                    [
                        'rounded-br' => [
                            '',
                            'none',
                            'full',
                            new ThemeRef('radius'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'rounded-bl' => [
                    [
                        'rounded-bl' => [
                            '',
                            'none',
                            'full',
                            new ThemeRef('radius'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'border-w' => [
                    [
                        'border' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'border-w-x' => [
                    [
                        'border-x' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'border-w-y' => [
                    [
                        'border-y' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'border-w-s' => [
                    [
                        'border-s' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'border-w-e' => [
                    [
                        'border-e' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'border-w-bs' => [
                    [
                        'border-bs' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'border-w-be' => [
                    [
                        'border-be' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'border-w-t' => [
                    [
                        'border-t' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'border-w-r' => [
                    [
                        'border-r' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'border-w-b' => [
                    [
                        'border-b' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'border-w-l' => [
                    [
                        'border-l' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'divide-x' => [
                    [
                        'divide-x' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'divide-x-reverse' => [
                    'divide-x-reverse',
                ],
                'divide-y' => [
                    [
                        'divide-y' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'divide-y-reverse' => [
                    'divide-y-reverse',
                ],
                'border-style' => [
                    [
                        'border' => [
                            'solid',
                            'dashed',
                            'dotted',
                            'double',
                            'hidden',
                            'none',
                        ],
                    ],
                ],
                'divide-style' => [
                    [
                        'divide' => [
                            'solid',
                            'dashed',
                            'dotted',
                            'double',
                            'hidden',
                            'none',
                        ],
                    ],
                ],
                'border-color' => [
                    [
                        'border' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'border-color-x' => [
                    [
                        'border-x' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'border-color-y' => [
                    [
                        'border-y' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'border-color-s' => [
                    [
                        'border-s' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'border-color-e' => [
                    [
                        'border-e' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'border-color-bs' => [
                    [
                        'border-bs' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'border-color-be' => [
                    [
                        'border-be' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'border-color-t' => [
                    [
                        'border-t' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'border-color-r' => [
                    [
                        'border-r' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'border-color-b' => [
                    [
                        'border-b' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'border-color-l' => [
                    [
                        'border-l' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'divide-color' => [
                    [
                        'divide' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'outline-style' => [
                    [
                        'outline' => [
                            'solid',
                            'dashed',
                            'dotted',
                            'double',
                            'none',
                            'hidden',
                        ],
                    ],
                ],
                'outline-offset' => [
                    [
                        'outline-offset' => [
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'outline-w' => [
                    [
                        'outline' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'outline-color' => [
                    [
                        'outline' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'shadow' => [
                    [
                        'shadow' => [
                            '',
                            'none',
                            new ThemeRef('shadow'),
                            Validators::isArbitraryVariableShadow(...),
                            Validators::isArbitraryShadow(...),
                        ],
                    ],
                ],
                'shadow-color' => [
                    [
                        'shadow' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'inset-shadow' => [
                    [
                        'inset-shadow' => [
                            'none',
                            new ThemeRef('inset-shadow'),
                            Validators::isArbitraryVariableShadow(...),
                            Validators::isArbitraryShadow(...),
                        ],
                    ],
                ],
                'inset-shadow-color' => [
                    [
                        'inset-shadow' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'ring-w' => [
                    [
                        'ring' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'ring-w-inset' => [
                    'ring-inset',
                ],
                'ring-color' => [
                    [
                        'ring' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'ring-offset-w' => [
                    [
                        'ring-offset' => [
                            Validators::isNumber(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'ring-offset-color' => [
                    [
                        'ring-offset' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'inset-ring-w' => [
                    [
                        'inset-ring' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                        ],
                    ],
                ],
                'inset-ring-color' => [
                    [
                        'inset-ring' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'text-shadow' => [
                    [
                        'text-shadow' => [
                            'none',
                            new ThemeRef('text-shadow'),
                            Validators::isArbitraryVariableShadow(...),
                            Validators::isArbitraryShadow(...),
                        ],
                    ],
                ],
                'text-shadow-color' => [
                    [
                        'text-shadow' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'opacity' => [
                    [
                        'opacity' => [
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mix-blend' => [
                    [
                        'mix-blend' => [
                            'normal',
                            'multiply',
                            'screen',
                            'overlay',
                            'darken',
                            'lighten',
                            'color-dodge',
                            'color-burn',
                            'hard-light',
                            'soft-light',
                            'difference',
                            'exclusion',
                            'hue',
                            'saturation',
                            'color',
                            'luminosity',
                            'plus-darker',
                            'plus-lighter',
                        ],
                    ],
                ],
                'bg-blend' => [
                    [
                        'bg-blend' => [
                            'normal',
                            'multiply',
                            'screen',
                            'overlay',
                            'darken',
                            'lighten',
                            'color-dodge',
                            'color-burn',
                            'hard-light',
                            'soft-light',
                            'difference',
                            'exclusion',
                            'hue',
                            'saturation',
                            'color',
                            'luminosity',
                        ],
                    ],
                ],
                'mask-clip' => [
                    [
                        'mask-clip' => [
                            'border',
                            'padding',
                            'content',
                            'fill',
                            'stroke',
                            'view',
                        ],
                    ],
                    'mask-no-clip',
                ],
                'mask-composite' => [
                    [
                        'mask' => [
                            'add',
                            'subtract',
                            'intersect',
                            'exclude',
                        ],
                    ],
                ],
                'mask-image-linear-pos' => [
                    [
                        'mask-linear' => [
                            Validators::isNumber(...),
                        ],
                    ],
                ],
                'mask-image-linear-from-pos' => [
                    [
                        'mask-linear-from' => [
                            Validators::isNumber(...),
                            Validators::isPercent(...),
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                        ],
                    ],
                ],
                'mask-image-linear-to-pos' => [
                    [
                        'mask-linear-to' => [
                            Validators::isNumber(...),
                            Validators::isPercent(...),
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                        ],
                    ],
                ],
                'mask-image-linear-from-color' => [
                    [
                        'mask-linear-from' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mask-image-linear-to-color' => [
                    [
                        'mask-linear-to' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mask-image-t-from-pos' => [
                    [
                        'mask-t-from' => [
                            Validators::isNumber(...),
                            Validators::isPercent(...),
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                        ],
                    ],
                ],
                'mask-image-t-to-pos' => [
                    [
                        'mask-t-to' => [
                            Validators::isNumber(...),
                            Validators::isPercent(...),
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                        ],
                    ],
                ],
                'mask-image-t-from-color' => [
                    [
                        'mask-t-from' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mask-image-t-to-color' => [
                    [
                        'mask-t-to' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mask-image-r-from-pos' => [
                    [
                        'mask-r-from' => [
                            Validators::isNumber(...),
                            Validators::isPercent(...),
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                        ],
                    ],
                ],
                'mask-image-r-to-pos' => [
                    [
                        'mask-r-to' => [
                            Validators::isNumber(...),
                            Validators::isPercent(...),
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                        ],
                    ],
                ],
                'mask-image-r-from-color' => [
                    [
                        'mask-r-from' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mask-image-r-to-color' => [
                    [
                        'mask-r-to' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mask-image-b-from-pos' => [
                    [
                        'mask-b-from' => [
                            Validators::isNumber(...),
                            Validators::isPercent(...),
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                        ],
                    ],
                ],
                'mask-image-b-to-pos' => [
                    [
                        'mask-b-to' => [
                            Validators::isNumber(...),
                            Validators::isPercent(...),
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                        ],
                    ],
                ],
                'mask-image-b-from-color' => [
                    [
                        'mask-b-from' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mask-image-b-to-color' => [
                    [
                        'mask-b-to' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mask-image-l-from-pos' => [
                    [
                        'mask-l-from' => [
                            Validators::isNumber(...),
                            Validators::isPercent(...),
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                        ],
                    ],
                ],
                'mask-image-l-to-pos' => [
                    [
                        'mask-l-to' => [
                            Validators::isNumber(...),
                            Validators::isPercent(...),
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                        ],
                    ],
                ],
                'mask-image-l-from-color' => [
                    [
                        'mask-l-from' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mask-image-l-to-color' => [
                    [
                        'mask-l-to' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mask-image-x-from-pos' => [
                    [
                        'mask-x-from' => [
                            Validators::isNumber(...),
                            Validators::isPercent(...),
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                        ],
                    ],
                ],
                'mask-image-x-to-pos' => [
                    [
                        'mask-x-to' => [
                            Validators::isNumber(...),
                            Validators::isPercent(...),
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                        ],
                    ],
                ],
                'mask-image-x-from-color' => [
                    [
                        'mask-x-from' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mask-image-x-to-color' => [
                    [
                        'mask-x-to' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mask-image-y-from-pos' => [
                    [
                        'mask-y-from' => [
                            Validators::isNumber(...),
                            Validators::isPercent(...),
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                        ],
                    ],
                ],
                'mask-image-y-to-pos' => [
                    [
                        'mask-y-to' => [
                            Validators::isNumber(...),
                            Validators::isPercent(...),
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                        ],
                    ],
                ],
                'mask-image-y-from-color' => [
                    [
                        'mask-y-from' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mask-image-y-to-color' => [
                    [
                        'mask-y-to' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mask-image-radial' => [
                    [
                        'mask-radial' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mask-image-radial-from-pos' => [
                    [
                        'mask-radial-from' => [
                            Validators::isNumber(...),
                            Validators::isPercent(...),
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                        ],
                    ],
                ],
                'mask-image-radial-to-pos' => [
                    [
                        'mask-radial-to' => [
                            Validators::isNumber(...),
                            Validators::isPercent(...),
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                        ],
                    ],
                ],
                'mask-image-radial-from-color' => [
                    [
                        'mask-radial-from' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mask-image-radial-to-color' => [
                    [
                        'mask-radial-to' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mask-image-radial-shape' => [
                    [
                        'mask-radial' => [
                            'circle',
                            'ellipse',
                        ],
                    ],
                ],
                'mask-image-radial-size' => [
                    [
                        'mask-radial' => [
                            [
                                'closest' => [
                                    'side',
                                    'corner',
                                ],
                                'farthest' => [
                                    'side',
                                    'corner',
                                ],
                            ],
                        ],
                    ],
                ],
                'mask-image-radial-pos' => [
                    [
                        'mask-radial-at' => [
                            'center',
                            'top',
                            'bottom',
                            'left',
                            'right',
                            'top-left',
                            'left-top',
                            'top-right',
                            'right-top',
                            'bottom-right',
                            'right-bottom',
                            'bottom-left',
                            'left-bottom',
                        ],
                    ],
                ],
                'mask-image-conic-pos' => [
                    [
                        'mask-conic' => [
                            Validators::isNumber(...),
                        ],
                    ],
                ],
                'mask-image-conic-from-pos' => [
                    [
                        'mask-conic-from' => [
                            Validators::isNumber(...),
                            Validators::isPercent(...),
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                        ],
                    ],
                ],
                'mask-image-conic-to-pos' => [
                    [
                        'mask-conic-to' => [
                            Validators::isNumber(...),
                            Validators::isPercent(...),
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                        ],
                    ],
                ],
                'mask-image-conic-from-color' => [
                    [
                        'mask-conic-from' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mask-image-conic-to-color' => [
                    [
                        'mask-conic-to' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'mask-mode' => [
                    [
                        'mask' => [
                            'alpha',
                            'luminance',
                            'match',
                        ],
                    ],
                ],
                'mask-origin' => [
                    [
                        'mask-origin' => [
                            'border',
                            'padding',
                            'content',
                            'fill',
                            'stroke',
                            'view',
                        ],
                    ],
                ],
                'mask-position' => [
                    [
                        'mask' => [
                            'center',
                            'top',
                            'bottom',
                            'left',
                            'right',
                            'top-left',
                            'left-top',
                            'top-right',
                            'right-top',
                            'bottom-right',
                            'right-bottom',
                            'bottom-left',
                            'left-bottom',
                            Validators::isArbitraryVariablePosition(...),
                            Validators::isArbitraryPosition(...),
                            [
                                'position' => [
                                    Validators::isArbitraryVariable(...),
                                    Validators::isArbitraryValue(...),
                                ],
                            ],
                        ],
                    ],
                ],
                'mask-repeat' => [
                    [
                        'mask' => [
                            'no-repeat',
                            [
                                'repeat' => [
                                    '',
                                    'x',
                                    'y',
                                    'space',
                                    'round',
                                ],
                            ],
                        ],
                    ],
                ],
                'mask-size' => [
                    [
                        'mask' => [
                            'auto',
                            'cover',
                            'contain',
                            Validators::isArbitraryVariableSize(...),
                            Validators::isArbitrarySize(...),
                            [
                                'size' => [
                                    Validators::isArbitraryVariable(...),
                                    Validators::isArbitraryValue(...),
                                ],
                            ],
                        ],
                    ],
                ],
                'mask-type' => [
                    [
                        'mask-type' => [
                            'alpha',
                            'luminance',
                        ],
                    ],
                ],
                'mask-image' => [
                    [
                        'mask' => [
                            'none',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'filter' => [
                    [
                        'filter' => [
                            '',
                            'none',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'blur' => [
                    [
                        'blur' => [
                            '',
                            'none',
                            new ThemeRef('blur'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'brightness' => [
                    [
                        'brightness' => [
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'contrast' => [
                    [
                        'contrast' => [
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'drop-shadow' => [
                    [
                        'drop-shadow' => [
                            '',
                            'none',
                            new ThemeRef('drop-shadow'),
                            Validators::isArbitraryVariableShadow(...),
                            Validators::isArbitraryShadow(...),
                        ],
                    ],
                ],
                'drop-shadow-color' => [
                    [
                        'drop-shadow' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'grayscale' => [
                    [
                        'grayscale' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'hue-rotate' => [
                    [
                        'hue-rotate' => [
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'invert' => [
                    [
                        'invert' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'saturate' => [
                    [
                        'saturate' => [
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'sepia' => [
                    [
                        'sepia' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'backdrop-filter' => [
                    [
                        'backdrop-filter' => [
                            '',
                            'none',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'backdrop-blur' => [
                    [
                        'backdrop-blur' => [
                            '',
                            'none',
                            new ThemeRef('blur'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'backdrop-brightness' => [
                    [
                        'backdrop-brightness' => [
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'backdrop-contrast' => [
                    [
                        'backdrop-contrast' => [
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'backdrop-grayscale' => [
                    [
                        'backdrop-grayscale' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'backdrop-hue-rotate' => [
                    [
                        'backdrop-hue-rotate' => [
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'backdrop-invert' => [
                    [
                        'backdrop-invert' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'backdrop-opacity' => [
                    [
                        'backdrop-opacity' => [
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'backdrop-saturate' => [
                    [
                        'backdrop-saturate' => [
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'backdrop-sepia' => [
                    [
                        'backdrop-sepia' => [
                            '',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'border-collapse' => [
                    [
                        'border' => [
                            'collapse',
                            'separate',
                        ],
                    ],
                ],
                'border-spacing' => [
                    [
                        'border-spacing' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'border-spacing-x' => [
                    [
                        'border-spacing-x' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'border-spacing-y' => [
                    [
                        'border-spacing-y' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'table-layout' => [
                    [
                        'table' => [
                            'auto',
                            'fixed',
                        ],
                    ],
                ],
                'caption' => [
                    [
                        'caption' => [
                            'top',
                            'bottom',
                        ],
                    ],
                ],
                'transition' => [
                    [
                        'transition' => [
                            '',
                            'all',
                            'colors',
                            'opacity',
                            'shadow',
                            'transform',
                            'none',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'transition-behavior' => [
                    [
                        'transition' => [
                            'normal',
                            'discrete',
                        ],
                    ],
                ],
                'duration' => [
                    [
                        'duration' => [
                            Validators::isNumber(...),
                            'initial',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'ease' => [
                    [
                        'ease' => [
                            'linear',
                            'initial',
                            new ThemeRef('ease'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'delay' => [
                    [
                        'delay' => [
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'animate' => [
                    [
                        'animate' => [
                            'none',
                            new ThemeRef('animate'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'backface' => [
                    [
                        'backface' => [
                            'hidden',
                            'visible',
                        ],
                    ],
                ],
                'perspective' => [
                    [
                        'perspective' => [
                            new ThemeRef('perspective'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'perspective-origin' => [
                    [
                        'perspective-origin' => [
                            'center',
                            'top',
                            'bottom',
                            'left',
                            'right',
                            'top-left',
                            'left-top',
                            'top-right',
                            'right-top',
                            'bottom-right',
                            'right-bottom',
                            'bottom-left',
                            'left-bottom',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'rotate' => [
                    [
                        'rotate' => [
                            'none',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'rotate-x' => [
                    [
                        'rotate-x' => [
                            'none',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'rotate-y' => [
                    [
                        'rotate-y' => [
                            'none',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'rotate-z' => [
                    [
                        'rotate-z' => [
                            'none',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'scale' => [
                    [
                        'scale' => [
                            'none',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'scale-x' => [
                    [
                        'scale-x' => [
                            'none',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'scale-y' => [
                    [
                        'scale-y' => [
                            'none',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'scale-z' => [
                    [
                        'scale-z' => [
                            'none',
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'scale-3d' => [
                    'scale-3d',
                ],
                'skew' => [
                    [
                        'skew' => [
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'skew-x' => [
                    [
                        'skew-x' => [
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'skew-y' => [
                    [
                        'skew-y' => [
                            Validators::isNumber(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'transform' => [
                    [
                        'transform' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            '',
                            'none',
                            'gpu',
                            'cpu',
                        ],
                    ],
                ],
                'transform-origin' => [
                    [
                        'origin' => [
                            'center',
                            'top',
                            'bottom',
                            'left',
                            'right',
                            'top-left',
                            'left-top',
                            'top-right',
                            'right-top',
                            'bottom-right',
                            'right-bottom',
                            'bottom-left',
                            'left-bottom',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'transform-style' => [
                    [
                        'transform' => [
                            '3d',
                            'flat',
                        ],
                    ],
                ],
                'translate' => [
                    [
                        'translate' => [
                            Validators::isFraction(...),
                            'full',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'translate-x' => [
                    [
                        'translate-x' => [
                            Validators::isFraction(...),
                            'full',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'translate-y' => [
                    [
                        'translate-y' => [
                            Validators::isFraction(...),
                            'full',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'translate-z' => [
                    [
                        'translate-z' => [
                            Validators::isFraction(...),
                            'full',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'translate-none' => [
                    'translate-none',
                ],
                'zoom' => [
                    [
                        'zoom' => [
                            Validators::isInteger(...),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'accent' => [
                    [
                        'accent' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'appearance' => [
                    [
                        'appearance' => [
                            'none',
                            'auto',
                        ],
                    ],
                ],
                'caret-color' => [
                    [
                        'caret' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'color-scheme' => [
                    [
                        'scheme' => [
                            'normal',
                            'dark',
                            'light',
                            'light-dark',
                            'only-dark',
                            'only-light',
                        ],
                    ],
                ],
                'cursor' => [
                    [
                        'cursor' => [
                            'auto',
                            'default',
                            'pointer',
                            'wait',
                            'text',
                            'move',
                            'help',
                            'not-allowed',
                            'none',
                            'context-menu',
                            'progress',
                            'cell',
                            'crosshair',
                            'vertical-text',
                            'alias',
                            'copy',
                            'no-drop',
                            'grab',
                            'grabbing',
                            'all-scroll',
                            'col-resize',
                            'row-resize',
                            'n-resize',
                            'e-resize',
                            's-resize',
                            'w-resize',
                            'ne-resize',
                            'nw-resize',
                            'se-resize',
                            'sw-resize',
                            'ew-resize',
                            'ns-resize',
                            'nesw-resize',
                            'nwse-resize',
                            'zoom-in',
                            'zoom-out',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'field-sizing' => [
                    [
                        'field-sizing' => [
                            'fixed',
                            'content',
                        ],
                    ],
                ],
                'pointer-events' => [
                    [
                        'pointer-events' => [
                            'auto',
                            'none',
                        ],
                    ],
                ],
                'resize' => [
                    [
                        'resize' => [
                            'none',
                            '',
                            'y',
                            'x',
                        ],
                    ],
                ],
                'scroll-behavior' => [
                    [
                        'scroll' => [
                            'auto',
                            'smooth',
                        ],
                    ],
                ],
                'scrollbar-thumb-color' => [
                    [
                        'scrollbar-thumb' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'scrollbar-track-color' => [
                    [
                        'scrollbar-track' => [
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'scrollbar-gutter' => [
                    [
                        'scrollbar-gutter' => [
                            'auto',
                            'stable',
                            'both',
                        ],
                    ],
                ],
                'scrollbar-w' => [
                    [
                        'scrollbar' => [
                            'auto',
                            'thin',
                            'none',
                        ],
                    ],
                ],
                'scroll-m' => [
                    [
                        'scroll-m' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-mx' => [
                    [
                        'scroll-mx' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-my' => [
                    [
                        'scroll-my' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-ms' => [
                    [
                        'scroll-ms' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-me' => [
                    [
                        'scroll-me' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-mbs' => [
                    [
                        'scroll-mbs' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-mbe' => [
                    [
                        'scroll-mbe' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-mt' => [
                    [
                        'scroll-mt' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-mr' => [
                    [
                        'scroll-mr' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-mb' => [
                    [
                        'scroll-mb' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-ml' => [
                    [
                        'scroll-ml' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-p' => [
                    [
                        'scroll-p' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-px' => [
                    [
                        'scroll-px' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-py' => [
                    [
                        'scroll-py' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-ps' => [
                    [
                        'scroll-ps' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-pe' => [
                    [
                        'scroll-pe' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-pbs' => [
                    [
                        'scroll-pbs' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-pbe' => [
                    [
                        'scroll-pbe' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-pt' => [
                    [
                        'scroll-pt' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-pr' => [
                    [
                        'scroll-pr' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-pb' => [
                    [
                        'scroll-pb' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'scroll-pl' => [
                    [
                        'scroll-pl' => [
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                            new ThemeRef('spacing'),
                        ],
                    ],
                ],
                'snap-align' => [
                    [
                        'snap' => [
                            'start',
                            'end',
                            'center',
                            'align-none',
                        ],
                    ],
                ],
                'snap-stop' => [
                    [
                        'snap' => [
                            'normal',
                            'always',
                        ],
                    ],
                ],
                'snap-type' => [
                    [
                        'snap' => [
                            'none',
                            'x',
                            'y',
                            'both',
                        ],
                    ],
                ],
                'snap-strictness' => [
                    [
                        'snap' => [
                            'mandatory',
                            'proximity',
                        ],
                    ],
                ],
                'touch' => [
                    [
                        'touch' => [
                            'auto',
                            'none',
                            'manipulation',
                        ],
                    ],
                ],
                'touch-x' => [
                    [
                        'touch-pan' => [
                            'x',
                            'left',
                            'right',
                        ],
                    ],
                ],
                'touch-y' => [
                    [
                        'touch-pan' => [
                            'y',
                            'up',
                            'down',
                        ],
                    ],
                ],
                'touch-pz' => [
                    'touch-pinch-zoom',
                ],
                'select' => [
                    [
                        'select' => [
                            'none',
                            'text',
                            'all',
                            'auto',
                        ],
                    ],
                ],
                'will-change' => [
                    [
                        'will-change' => [
                            'auto',
                            'scroll',
                            'contents',
                            'transform',
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'fill' => [
                    [
                        'fill' => [
                            'none',
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'stroke-w' => [
                    [
                        'stroke' => [
                            Validators::isNumber(...),
                            Validators::isArbitraryVariableLength(...),
                            Validators::isArbitraryLength(...),
                            Validators::isArbitraryNumber(...),
                        ],
                    ],
                ],
                'stroke' => [
                    [
                        'stroke' => [
                            'none',
                            new ThemeRef('color'),
                            Validators::isArbitraryVariable(...),
                            Validators::isArbitraryValue(...),
                        ],
                    ],
                ],
                'forced-color-adjust' => [
                    [
                        'forced-color-adjust' => [
                            'auto',
                            'none',
                        ],
                    ],
                ],
            ],
            'conflictingClassGroups' => [
                'container-named' => [
                    'container-type',
                ],
                'overflow' => [
                    'overflow-x',
                    'overflow-y',
                ],
                'overscroll' => [
                    'overscroll-x',
                    'overscroll-y',
                ],
                'inset' => [
                    'inset-x',
                    'inset-y',
                    'inset-bs',
                    'inset-be',
                    'start',
                    'end',
                    'top',
                    'right',
                    'bottom',
                    'left',
                ],
                'inset-x' => [
                    'right',
                    'left',
                ],
                'inset-y' => [
                    'top',
                    'bottom',
                ],
                'flex' => [
                    'basis',
                    'grow',
                    'shrink',
                ],
                'gap' => [
                    'gap-x',
                    'gap-y',
                ],
                'p' => [
                    'px',
                    'py',
                    'ps',
                    'pe',
                    'pbs',
                    'pbe',
                    'pt',
                    'pr',
                    'pb',
                    'pl',
                ],
                'px' => [
                    'pr',
                    'pl',
                ],
                'py' => [
                    'pt',
                    'pb',
                ],
                'm' => [
                    'mx',
                    'my',
                    'ms',
                    'me',
                    'mbs',
                    'mbe',
                    'mt',
                    'mr',
                    'mb',
                    'ml',
                ],
                'mx' => [
                    'mr',
                    'ml',
                ],
                'my' => [
                    'mt',
                    'mb',
                ],
                'size' => [
                    'w',
                    'h',
                ],
                'font-size' => [
                    'leading',
                ],
                'fvn-normal' => [
                    'fvn-ordinal',
                    'fvn-slashed-zero',
                    'fvn-figure',
                    'fvn-spacing',
                    'fvn-fraction',
                ],
                'fvn-ordinal' => [
                    'fvn-normal',
                ],
                'fvn-slashed-zero' => [
                    'fvn-normal',
                ],
                'fvn-figure' => [
                    'fvn-normal',
                ],
                'fvn-spacing' => [
                    'fvn-normal',
                ],
                'fvn-fraction' => [
                    'fvn-normal',
                ],
                'line-clamp' => [
                    'display',
                    'overflow',
                ],
                'rounded' => [
                    'rounded-s',
                    'rounded-e',
                    'rounded-t',
                    'rounded-r',
                    'rounded-b',
                    'rounded-l',
                    'rounded-ss',
                    'rounded-se',
                    'rounded-ee',
                    'rounded-es',
                    'rounded-tl',
                    'rounded-tr',
                    'rounded-br',
                    'rounded-bl',
                ],
                'rounded-s' => [
                    'rounded-ss',
                    'rounded-es',
                ],
                'rounded-e' => [
                    'rounded-se',
                    'rounded-ee',
                ],
                'rounded-t' => [
                    'rounded-tl',
                    'rounded-tr',
                ],
                'rounded-r' => [
                    'rounded-tr',
                    'rounded-br',
                ],
                'rounded-b' => [
                    'rounded-br',
                    'rounded-bl',
                ],
                'rounded-l' => [
                    'rounded-tl',
                    'rounded-bl',
                ],
                'border-spacing' => [
                    'border-spacing-x',
                    'border-spacing-y',
                ],
                'border-w' => [
                    'border-w-x',
                    'border-w-y',
                    'border-w-s',
                    'border-w-e',
                    'border-w-bs',
                    'border-w-be',
                    'border-w-t',
                    'border-w-r',
                    'border-w-b',
                    'border-w-l',
                ],
                'border-w-x' => [
                    'border-w-r',
                    'border-w-l',
                ],
                'border-w-y' => [
                    'border-w-t',
                    'border-w-b',
                ],
                'border-color' => [
                    'border-color-x',
                    'border-color-y',
                    'border-color-s',
                    'border-color-e',
                    'border-color-bs',
                    'border-color-be',
                    'border-color-t',
                    'border-color-r',
                    'border-color-b',
                    'border-color-l',
                ],
                'border-color-x' => [
                    'border-color-r',
                    'border-color-l',
                ],
                'border-color-y' => [
                    'border-color-t',
                    'border-color-b',
                ],
                'translate' => [
                    'translate-x',
                    'translate-y',
                    'translate-none',
                ],
                'translate-none' => [
                    'translate',
                    'translate-x',
                    'translate-y',
                    'translate-z',
                ],
                'scroll-m' => [
                    'scroll-mx',
                    'scroll-my',
                    'scroll-ms',
                    'scroll-me',
                    'scroll-mbs',
                    'scroll-mbe',
                    'scroll-mt',
                    'scroll-mr',
                    'scroll-mb',
                    'scroll-ml',
                ],
                'scroll-mx' => [
                    'scroll-mr',
                    'scroll-ml',
                ],
                'scroll-my' => [
                    'scroll-mt',
                    'scroll-mb',
                ],
                'scroll-p' => [
                    'scroll-px',
                    'scroll-py',
                    'scroll-ps',
                    'scroll-pe',
                    'scroll-pbs',
                    'scroll-pbe',
                    'scroll-pt',
                    'scroll-pr',
                    'scroll-pb',
                    'scroll-pl',
                ],
                'scroll-px' => [
                    'scroll-pr',
                    'scroll-pl',
                ],
                'scroll-py' => [
                    'scroll-pt',
                    'scroll-pb',
                ],
                'touch' => [
                    'touch-x',
                    'touch-y',
                    'touch-pz',
                ],
                'touch-x' => [
                    'touch',
                ],
                'touch-y' => [
                    'touch',
                ],
                'touch-pz' => [
                    'touch',
                ],
            ],
            'conflictingClassGroupModifiers' => [
                'font-size' => [
                    'leading',
                ],
            ],
            'postfixLookupClassGroups' => [
                'container-type',
            ],
            'orderSensitiveModifiers' => [
                '*',
                '**',
                'after',
                'backdrop',
                'before',
                'details-content',
                'file',
                'first-letter',
                'first-line',
                'marker',
                'placeholder',
                'selection',
            ],
        ];
    }
}
