<?php

declare(strict_types=1);

use Stamat\TailwindMerge\ConfigMerger;
use Stamat\TailwindMerge\TailwindMerge;
use Stamat\TailwindMerge\ThemeRef;

test('prefix working correctly', function (): void {
    $tw = TailwindMerge::create(['prefix' => 'tw']);

    expect($tw->merge('tw:block tw:hidden'))->toBe('tw:hidden')
        ->and($tw->merge('block hidden'))->toBe('block hidden')
        ->and($tw->merge('tw:p-3 tw:p-2'))->toBe('tw:p-2')
        ->and($tw->merge('p-3 p-2'))->toBe('p-3 p-2')
        ->and($tw->merge('tw:right-0! tw:inset-0!'))->toBe('tw:inset-0!')
        ->and($tw->merge('tw:hover:focus:right-0! tw:focus:hover:inset-0!'))->toBe('tw:focus:hover:inset-0!');
});

test('theme scale can be extended', function (): void {
    $tw = TailwindMerge::create([
        'extend' => [
            'theme' => [
                'spacing' => ['my-space'],
                'leading' => ['my-leading'],
            ],
        ],
    ]);

    expect($tw->merge('p-3 p-my-space p-my-margin'))->toBe('p-my-space p-my-margin')
        ->and($tw->merge('leading-3 leading-my-space leading-my-leading'))->toBe('leading-my-leading');
});

test('theme object can be extended', function (): void {
    $tw = TailwindMerge::create([
        'extend' => [
            'theme' => [
                'my-theme' => ['hallo', 'hello'],
            ],
            'classGroups' => [
                'px' => [['px' => [new ThemeRef('my-theme')]]],
            ],
        ],
    ]);

    expect($tw->merge('p-3 p-hello p-hallo'))->toBe('p-3 p-hello p-hallo')
        ->and($tw->merge('px-3 px-hello px-hallo'))->toBe('px-hallo');
});

test('mergeConfigs has correct behavior', function (): void {
    expect(ConfigMerger::merge(
        [
            'cacheSize' => 50,
            'prefix' => 'tw',
            'theme' => [
                'hi' => ['ho'],
                'themeToOverride' => ['to-override'],
            ],
            'classGroups' => [
                'fooKey' => [['fooKey' => ['one', 'two']]],
                'bla' => [['bli' => ['blub', 'blublub']]],
                'groupToOverride' => ['this', 'will', 'be', 'overridden'],
                'groupToOverride2' => ['this', 'will', 'not', 'be', 'overridden'],
            ],
            'conflictingClassGroups' => [
                'toOverride' => ['groupToOverride'],
            ],
            'conflictingClassGroupModifiers' => [
                'hello' => ['world'],
                'toOverride' => ['groupToOverride-2'],
            ],
            'postfixLookupClassGroups' => ['postfix-1'],
            'orderSensitiveModifiers' => ['order-1'],
        ],
        [
            'override' => [
                'theme' => [
                    'themeToOverride' => ['overridden'],
                ],
                'classGroups' => [
                    'groupToOverride' => ['I', 'overrode', 'you'],
                    'groupToOverride2' => null,
                ],
                'conflictingClassGroups' => [
                    'toOverride' => ['groupOverridden'],
                ],
                'conflictingClassGroupModifiers' => [
                    'toOverride' => ['overridden-2'],
                ],
                'postfixLookupClassGroups' => ['groupToOverride'],
                'orderSensitiveModifiers' => ['order-2'],
            ],
            'extend' => [
                'classGroups' => [
                    'fooKey' => [['fooKey' => ['bar', 'baz']]],
                    'fooKey2' => [['fooKey' => ['qux', 'quux']]],
                    'otherKey' => ['nother', 'group'],
                    'groupToOverride' => ['extended'],
                ],
                'conflictingClassGroups' => [
                    'fooKey' => ['otherKey'],
                    'otherKey' => ['fooKey', 'fooKey2'],
                ],
                'conflictingClassGroupModifiers' => [
                    'hello' => ['world2'],
                ],
                'postfixLookupClassGroups' => ['fooKey'],
                'orderSensitiveModifiers' => ['order-3'],
            ],
        ],
    ))->toBe([
        'cacheSize' => 50,
        'prefix' => 'tw',
        'theme' => [
            'hi' => ['ho'],
            'themeToOverride' => ['overridden'],
        ],
        'classGroups' => [
            'fooKey' => [['fooKey' => ['one', 'two']], ['fooKey' => ['bar', 'baz']]],
            'bla' => [['bli' => ['blub', 'blublub']]],
            'groupToOverride' => ['I', 'overrode', 'you', 'extended'],
            'groupToOverride2' => ['this', 'will', 'not', 'be', 'overridden'],
            'fooKey2' => [['fooKey' => ['qux', 'quux']]],
            'otherKey' => ['nother', 'group'],
        ],
        'conflictingClassGroups' => [
            'toOverride' => ['groupOverridden'],
            'fooKey' => ['otherKey'],
            'otherKey' => ['fooKey', 'fooKey2'],
        ],
        'conflictingClassGroupModifiers' => [
            'hello' => ['world', 'world2'],
            'toOverride' => ['overridden-2'],
        ],
        'postfixLookupClassGroups' => ['groupToOverride', 'fooKey'],
        'orderSensitiveModifiers' => ['order-2', 'order-3'],
    ]);
});

test('conflicts across prefix modifiers', function (): void {
    $tw = TailwindMerge::instance();

    expect($tw->merge('hover:block hover:inline'))->toBe('hover:inline')
        ->and($tw->merge('hover:block hover:focus:inline'))->toBe('hover:block hover:focus:inline')
        ->and($tw->merge('hover:block hover:focus:inline focus:hover:inline'))->toBe('hover:block focus:hover:inline')
        ->and($tw->merge('focus-within:inline focus-within:block'))->toBe('focus-within:block');
});

test('conflicts across postfix modifiers', function (): void {
    $tw = TailwindMerge::instance();

    expect($tw->merge('text-lg/7 text-lg/8'))->toBe('text-lg/8')
        ->and($tw->merge('text-lg/none leading-9'))->toBe('text-lg/none leading-9')
        ->and($tw->merge('leading-9 text-lg/none'))->toBe('text-lg/none')
        ->and($tw->merge('w-full w-1/2'))->toBe('w-1/2');

    $custom = new TailwindMerge([
        'cacheSize' => 10,
        'theme' => [],
        'classGroups' => [
            'foo' => ['foo-1/2', 'foo-2/3'],
            'bar' => ['bar-1', 'bar-2'],
            'baz' => ['baz-1', 'baz-2'],
        ],
        'conflictingClassGroups' => [],
        'conflictingClassGroupModifiers' => [
            'baz' => ['bar'],
        ],
        'orderSensitiveModifiers' => [],
    ]);

    expect($custom->merge('foo-1/2 foo-2/3'))->toBe('foo-2/3')
        ->and($custom->merge('bar-1 bar-2'))->toBe('bar-2')
        ->and($custom->merge('bar-1 baz-1'))->toBe('bar-1 baz-1')
        ->and($custom->merge('bar-1/2 bar-2'))->toBe('bar-2')
        ->and($custom->merge('bar-2 bar-1/2'))->toBe('bar-1/2')
        ->and($custom->merge('bar-1 baz-1/2'))->toBe('baz-1/2');
});

test('resolves full class names for configured postfix lookup groups', function (): void {
    $custom = new TailwindMerge([
        'cacheSize' => 10,
        'theme' => [],
        'classGroups' => [
            'base' => [['foo' => ['bar']]],
            'named' => [fn(string $value): bool => $value === 'foo-bar/baz'],
        ],
        'conflictingClassGroups' => [
            'named' => ['base'],
        ],
        'conflictingClassGroupModifiers' => [],
        'postfixLookupClassGroups' => ['base'],
        'orderSensitiveModifiers' => [],
    ]);

    expect($custom->merge('foo-bar foo-bar/baz'))->toBe('foo-bar/baz')
        ->and($custom->merge('foo-bar/baz foo-bar'))->toBe('foo-bar/baz foo-bar');
});

test('sorts modifiers correctly', function (): void {
    $tw = TailwindMerge::instance();

    expect($tw->merge('c:d:e:block d:c:e:inline'))->toBe('d:c:e:inline')
        ->and($tw->merge('*:before:block *:before:inline'))->toBe('*:before:inline')
        ->and($tw->merge('*:before:block before:*:inline'))->toBe('*:before:block before:*:inline')
        ->and($tw->merge('x:y:*:z:block y:x:*:z:inline'))->toBe('y:x:*:z:inline');
});

test('sorts modifiers correctly according to orderSensitiveModifiers', function (): void {
    $custom = new TailwindMerge([
        'cacheSize' => 10,
        'theme' => [],
        'classGroups' => [
            'foo' => ['foo-1', 'foo-2'],
        ],
        'conflictingClassGroups' => [],
        'conflictingClassGroupModifiers' => [],
        'orderSensitiveModifiers' => ['a', 'b'],
    ]);

    expect($custom->merge('c:d:e:foo-1 d:c:e:foo-2'))->toBe('d:c:e:foo-2')
        ->and($custom->merge('a:b:foo-1 a:b:foo-2'))->toBe('a:b:foo-2')
        ->and($custom->merge('a:b:foo-1 b:a:foo-2'))->toBe('a:b:foo-1 b:a:foo-2')
        ->and($custom->merge('x:y:a:z:foo-1 y:x:a:z:foo-2'))->toBe('y:x:a:z:foo-2');
});

test('create works correctly with single config extension', function (): void {
    $tw = TailwindMerge::create([
        'cacheSize' => 20,
        'extend' => [
            'classGroups' => [
                'fooKey' => [['fooKey' => ['bar', 'baz']]],
                'fooKey2' => [['fooKey' => ['qux', 'quux']], 'other-2'],
                'otherKey' => ['nother', 'group'],
            ],
            'conflictingClassGroups' => [
                'fooKey' => ['otherKey'],
                'otherKey' => ['fooKey', 'fooKey2'],
            ],
        ],
    ]);

    expect($tw->merge(''))->toBe('')
        ->and($tw->merge('my-modifier:fooKey-bar my-modifier:fooKey-baz'))->toBe('my-modifier:fooKey-baz')
        ->and($tw->merge('other-modifier:fooKey-bar other-modifier:fooKey-baz'))->toBe('other-modifier:fooKey-baz')
        ->and($tw->merge('group fooKey-bar'))->toBe('fooKey-bar')
        ->and($tw->merge('fooKey-bar group'))->toBe('group')
        ->and($tw->merge('group other-2'))->toBe('group other-2')
        ->and($tw->merge('other-2 group'))->toBe('group')
        ->and($tw->merge('p-10 p-20'))->toBe('p-20')
        ->and($tw->merge('hover:focus:p-10 focus:hover:p-20'))->toBe('focus:hover:p-20');
});

test('create overrides and extends correctly', function (): void {
    $tw = TailwindMerge::create([
        'cacheSize' => 20,
        'override' => [
            'classGroups' => [
                'shadow' => ['shadow-100', 'shadow-200'],
                'customKey' => ['custom-100'],
            ],
            'conflictingClassGroups' => [
                'p' => ['px'],
            ],
        ],
        'extend' => [
            'classGroups' => [
                'shadow' => ['shadow-300'],
                'customKey' => ['custom-200'],
                'font-size' => ['text-foo'],
            ],
            'conflictingClassGroups' => [
                'm' => ['h'],
            ],
        ],
    ]);

    expect($tw->merge('shadow-lg shadow-100 shadow-200'))->toBe('shadow-lg shadow-200')
        ->and($tw->merge('custom-100 custom-200'))->toBe('custom-200')
        ->and($tw->merge('text-lg text-foo'))->toBe('text-foo')
        ->and($tw->merge('px-3 py-3 p-3'))->toBe('py-3 p-3')
        ->and($tw->merge('p-3 px-3 py-3'))->toBe('p-3 px-3 py-3')
        ->and($tw->merge('mx-2 my-2 h-2 m-2'))->toBe('m-2')
        ->and($tw->merge('m-2 mx-2 my-2 h-2'))->toBe('m-2 mx-2 my-2 h-2');
});

test('custom full config works with validators and modifiers', function (): void {
    $custom = new TailwindMerge([
        'cacheSize' => 20,
        'theme' => [],
        'classGroups' => [
            'fooKey' => [['fooKey' => ['bar', 'baz']]],
            'fooKey2' => [['fooKey' => ['qux', 'quux']], 'other-2'],
            'otherKey' => ['nother', 'group'],
        ],
        'conflictingClassGroups' => [
            'fooKey' => ['otherKey'],
            'otherKey' => ['fooKey', 'fooKey2'],
        ],
        'conflictingClassGroupModifiers' => [],
        'orderSensitiveModifiers' => [],
    ]);

    expect($custom->merge(''))->toBe('')
        ->and($custom->merge('my-modifier:fooKey-bar my-modifier:fooKey-baz'))->toBe('my-modifier:fooKey-baz')
        ->and($custom->merge('other-modifier:fooKey-bar other-modifier:fooKey-baz'))->toBe('other-modifier:fooKey-baz')
        ->and($custom->merge('group fooKey-bar'))->toBe('fooKey-bar')
        ->and($custom->merge('fooKey-bar group'))->toBe('group')
        ->and($custom->merge('group other-2'))->toBe('group other-2')
        ->and($custom->merge('other-2 group'))->toBe('group');
});

test('rejects unknown config extension keys', function (): void {
    TailwindMerge::create(['classGroup' => []]);
})->throws(InvalidArgumentException::class, 'Unknown config key "classGroup"');

test('rejects unknown override/extend section keys', function (): void {
    TailwindMerge::create(['extend' => ['classGroup' => []]]);
})->throws(InvalidArgumentException::class, 'Unknown config key "extend.classGroup"');

test('rejects non-string class list leaves', function (): void {
    TailwindMerge::instance()->merge('block', [123]);
})->throws(InvalidArgumentException::class);

test('skips null and false entries', function (): void {
    expect(TailwindMerge::instance()->merge('block', null, false, ['px-2', null, ['py-4']]))->toBe('block px-2 py-4');
});

test('empty and whitespace input returns empty string', function (): void {
    expect(TailwindMerge::instance()->merge())->toBe('')
        ->and(TailwindMerge::instance()->merge('', '   ', [null, [false]]))->toBe('');
});
