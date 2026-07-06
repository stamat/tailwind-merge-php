<?php

declare(strict_types=1);

use Stamat\TailwindMerge\Validators;

test('isAny', function (): void {
    expect(Validators::isAny())->toBeTrue()
        ->and(Validators::isAny(''))->toBeTrue()
        ->and(Validators::isAny('something'))->toBeTrue();
});

test('isAnyNonArbitrary', function (): void {
    expect(Validators::isAnyNonArbitrary('test'))->toBeTrue()
        ->and(Validators::isAnyNonArbitrary('1234-hello-world'))->toBeTrue()
        ->and(Validators::isAnyNonArbitrary('[hello'))->toBeTrue()
        ->and(Validators::isAnyNonArbitrary('hello]'))->toBeTrue()
        ->and(Validators::isAnyNonArbitrary('[)'))->toBeTrue()
        ->and(Validators::isAnyNonArbitrary('(hello]'))->toBeTrue()
        ->and(Validators::isAnyNonArbitrary('[test]'))->toBeFalse()
        ->and(Validators::isAnyNonArbitrary('[label:test]'))->toBeFalse()
        ->and(Validators::isAnyNonArbitrary('(test)'))->toBeFalse()
        ->and(Validators::isAnyNonArbitrary('(label:test)'))->toBeFalse();
});

test('isNamedContainerQuery', function (): void {
    expect(Validators::isNamedContainerQuery('@container/sidebar'))->toBeTrue()
        ->and(Validators::isNamedContainerQuery('@container-normal/sidebar'))->toBeTrue()
        ->and(Validators::isNamedContainerQuery('@container-size/sidebar'))->toBeTrue()
        ->and(Validators::isNamedContainerQuery('@container/[sidebar]'))->toBeTrue()
        ->and(Validators::isNamedContainerQuery('@container-size/(--sidebar)'))->toBeTrue()
        ->and(Validators::isNamedContainerQuery('@container'))->toBeFalse()
        ->and(Validators::isNamedContainerQuery('@container-normal'))->toBeFalse()
        ->and(Validators::isNamedContainerQuery('@container-size'))->toBeFalse()
        ->and(Validators::isNamedContainerQuery('@container/'))->toBeFalse()
        ->and(Validators::isNamedContainerQuery('@container-normal/'))->toBeFalse()
        ->and(Validators::isNamedContainerQuery('@container-size/'))->toBeFalse()
        ->and(Validators::isNamedContainerQuery('@container-[size]/sidebar'))->toBeFalse()
        ->and(Validators::isNamedContainerQuery('@container-foo/sidebar'))->toBeFalse()
        ->and(Validators::isNamedContainerQuery('container/sidebar'))->toBeFalse()
        ->and(Validators::isNamedContainerQuery('hover:@container/sidebar'))->toBeFalse();
});

test('isArbitraryFamilyName', function (): void {
    expect(Validators::isArbitraryFamilyName('[family-name:Open_Sans]'))->toBeTrue()
        ->and(Validators::isArbitraryFamilyName('[family-name:var(--my-font)]'))->toBeTrue()
        ->and(Validators::isArbitraryFamilyName('[Open_Sans]'))->toBeFalse()
        ->and(Validators::isArbitraryFamilyName('[number:400]'))->toBeFalse()
        ->and(Validators::isArbitraryFamilyName('[weight:400]'))->toBeFalse()
        ->and(Validators::isArbitraryFamilyName('family-name:test'))->toBeFalse()
        ->and(Validators::isArbitraryFamilyName('(family-name:test)'))->toBeFalse();
});

test('isArbitraryImage', function (): void {
    expect(Validators::isArbitraryImage('[url:var(--my-url)]'))->toBeTrue()
        ->and(Validators::isArbitraryImage('[url(something)]'))->toBeTrue()
        ->and(Validators::isArbitraryImage('[url:bla]'))->toBeTrue()
        ->and(Validators::isArbitraryImage('[image:bla]'))->toBeTrue()
        ->and(Validators::isArbitraryImage('[linear-gradient(something)]'))->toBeTrue()
        ->and(Validators::isArbitraryImage('[repeating-conic-gradient(something)]'))->toBeTrue()
        ->and(Validators::isArbitraryImage('[var(--my-url)]'))->toBeFalse()
        ->and(Validators::isArbitraryImage('[bla]'))->toBeFalse()
        ->and(Validators::isArbitraryImage('url:2px'))->toBeFalse()
        ->and(Validators::isArbitraryImage('url(2px)'))->toBeFalse();
});

test('isArbitraryLength', function (): void {
    expect(Validators::isArbitraryLength('[3.7%]'))->toBeTrue()
        ->and(Validators::isArbitraryLength('[481px]'))->toBeTrue()
        ->and(Validators::isArbitraryLength('[19.1rem]'))->toBeTrue()
        ->and(Validators::isArbitraryLength('[50vw]'))->toBeTrue()
        ->and(Validators::isArbitraryLength('[56vh]'))->toBeTrue()
        ->and(Validators::isArbitraryLength('[length:var(--arbitrary)]'))->toBeTrue()
        ->and(Validators::isArbitraryLength('1'))->toBeFalse()
        ->and(Validators::isArbitraryLength('3px'))->toBeFalse()
        ->and(Validators::isArbitraryLength('1d5'))->toBeFalse()
        ->and(Validators::isArbitraryLength('[1]'))->toBeFalse()
        ->and(Validators::isArbitraryLength('[12px'))->toBeFalse()
        ->and(Validators::isArbitraryLength('12px]'))->toBeFalse()
        ->and(Validators::isArbitraryLength('one'))->toBeFalse();
});

test('isArbitraryNumber', function (): void {
    expect(Validators::isArbitraryNumber('[number:black]'))->toBeTrue()
        ->and(Validators::isArbitraryNumber('[number:bla]'))->toBeTrue()
        ->and(Validators::isArbitraryNumber('[number:230]'))->toBeTrue()
        ->and(Validators::isArbitraryNumber('[450]'))->toBeTrue()
        ->and(Validators::isArbitraryNumber('[2px]'))->toBeFalse()
        ->and(Validators::isArbitraryNumber('[bla]'))->toBeFalse()
        ->and(Validators::isArbitraryNumber('[black]'))->toBeFalse()
        ->and(Validators::isArbitraryNumber('black'))->toBeFalse()
        ->and(Validators::isArbitraryNumber('450'))->toBeFalse();
});

test('isArbitraryPosition', function (): void {
    expect(Validators::isArbitraryPosition('[position:2px]'))->toBeTrue()
        ->and(Validators::isArbitraryPosition('[position:bla]'))->toBeTrue()
        ->and(Validators::isArbitraryPosition('[percentage:bla]'))->toBeTrue()
        ->and(Validators::isArbitraryPosition('[2px]'))->toBeFalse()
        ->and(Validators::isArbitraryPosition('[bla]'))->toBeFalse()
        ->and(Validators::isArbitraryPosition('position:2px'))->toBeFalse();
});

test('isArbitraryShadow', function (): void {
    expect(Validators::isArbitraryShadow('[0_35px_60px_-15px_rgba(0,0,0,0.3)]'))->toBeTrue()
        ->and(Validators::isArbitraryShadow('[inset_0_1px_0,inset_0_-1px_0]'))->toBeTrue()
        ->and(Validators::isArbitraryShadow('[0_0_#00f]'))->toBeTrue()
        ->and(Validators::isArbitraryShadow('[.5rem_0_rgba(5,5,5,5)]'))->toBeTrue()
        ->and(Validators::isArbitraryShadow('[-.5rem_0_#123456]'))->toBeTrue()
        ->and(Validators::isArbitraryShadow('[0.5rem_-0_#123456]'))->toBeTrue()
        ->and(Validators::isArbitraryShadow('[0.5rem_-0.005vh_#123456]'))->toBeTrue()
        ->and(Validators::isArbitraryShadow('[0.5rem_-0.005vh]'))->toBeTrue()
        ->and(Validators::isArbitraryShadow('[rgba(5,5,5,5)]'))->toBeFalse()
        ->and(Validators::isArbitraryShadow('[#00f]'))->toBeFalse()
        ->and(Validators::isArbitraryShadow('[something-else]'))->toBeFalse();
});

test('isArbitraryWeight', function (): void {
    expect(Validators::isArbitraryWeight('[weight:400]'))->toBeTrue()
        ->and(Validators::isArbitraryWeight('[weight:bold]'))->toBeTrue()
        ->and(Validators::isArbitraryWeight('[number:400]'))->toBeTrue()
        ->and(Validators::isArbitraryWeight('[number:var(--my-weight)]'))->toBeTrue()
        ->and(Validators::isArbitraryWeight('[400]'))->toBeTrue()
        ->and(Validators::isArbitraryWeight('[bold]'))->toBeTrue()
        ->and(Validators::isArbitraryWeight('[family-name:test]'))->toBeFalse()
        ->and(Validators::isArbitraryWeight('weight:400'))->toBeFalse()
        ->and(Validators::isArbitraryWeight('(weight:400)'))->toBeFalse();
});

test('isArbitrarySize', function (): void {
    expect(Validators::isArbitrarySize('[size:2px]'))->toBeTrue()
        ->and(Validators::isArbitrarySize('[size:bla]'))->toBeTrue()
        ->and(Validators::isArbitrarySize('[length:bla]'))->toBeTrue()
        ->and(Validators::isArbitrarySize('[2px]'))->toBeFalse()
        ->and(Validators::isArbitrarySize('[bla]'))->toBeFalse()
        ->and(Validators::isArbitrarySize('size:2px'))->toBeFalse()
        ->and(Validators::isArbitrarySize('[percentage:bla]'))->toBeFalse();
});

test('isArbitraryValue', function (): void {
    expect(Validators::isArbitraryValue('[1]'))->toBeTrue()
        ->and(Validators::isArbitraryValue('[bla]'))->toBeTrue()
        ->and(Validators::isArbitraryValue('[not-an-arbitrary-value?]'))->toBeTrue()
        ->and(Validators::isArbitraryValue('[auto,auto,minmax(0,1fr),calc(100vw-50%)]'))->toBeTrue()
        ->and(Validators::isArbitraryValue('[]'))->toBeFalse()
        ->and(Validators::isArbitraryValue('[1'))->toBeFalse()
        ->and(Validators::isArbitraryValue('1]'))->toBeFalse()
        ->and(Validators::isArbitraryValue('1'))->toBeFalse()
        ->and(Validators::isArbitraryValue('one'))->toBeFalse()
        ->and(Validators::isArbitraryValue('o[n]e'))->toBeFalse();
});

test('isArbitraryVariable', function (): void {
    expect(Validators::isArbitraryVariable('(1)'))->toBeTrue()
        ->and(Validators::isArbitraryVariable('(bla)'))->toBeTrue()
        ->and(Validators::isArbitraryVariable('(not-an-arbitrary-value?)'))->toBeTrue()
        ->and(Validators::isArbitraryVariable('(--my-arbitrary-variable)'))->toBeTrue()
        ->and(Validators::isArbitraryVariable('(label:--my-arbitrary-variable)'))->toBeTrue()
        ->and(Validators::isArbitraryVariable('()'))->toBeFalse()
        ->and(Validators::isArbitraryVariable('(1'))->toBeFalse()
        ->and(Validators::isArbitraryVariable('1)'))->toBeFalse()
        ->and(Validators::isArbitraryVariable('1'))->toBeFalse()
        ->and(Validators::isArbitraryVariable('one'))->toBeFalse()
        ->and(Validators::isArbitraryVariable('o(n)e'))->toBeFalse();
});

test('isArbitraryVariableFamilyName', function (): void {
    expect(Validators::isArbitraryVariableFamilyName('(family-name:test)'))->toBeTrue()
        ->and(Validators::isArbitraryVariableFamilyName('(other:test)'))->toBeFalse()
        ->and(Validators::isArbitraryVariableFamilyName('(test)'))->toBeFalse()
        ->and(Validators::isArbitraryVariableFamilyName('family-name:test'))->toBeFalse();
});

test('isArbitraryVariableImage', function (): void {
    expect(Validators::isArbitraryVariableImage('(image:test)'))->toBeTrue()
        ->and(Validators::isArbitraryVariableImage('(url:test)'))->toBeTrue()
        ->and(Validators::isArbitraryVariableImage('(other:test)'))->toBeFalse()
        ->and(Validators::isArbitraryVariableImage('(test)'))->toBeFalse()
        ->and(Validators::isArbitraryVariableImage('image:test'))->toBeFalse();
});

test('isArbitraryVariableLength', function (): void {
    expect(Validators::isArbitraryVariableLength('(length:test)'))->toBeTrue()
        ->and(Validators::isArbitraryVariableLength('(other:test)'))->toBeFalse()
        ->and(Validators::isArbitraryVariableLength('(test)'))->toBeFalse()
        ->and(Validators::isArbitraryVariableLength('length:test'))->toBeFalse();
});

test('isArbitraryVariablePosition', function (): void {
    expect(Validators::isArbitraryVariablePosition('(position:test)'))->toBeTrue()
        ->and(Validators::isArbitraryVariablePosition('(other:test)'))->toBeFalse()
        ->and(Validators::isArbitraryVariablePosition('(test)'))->toBeFalse()
        ->and(Validators::isArbitraryVariablePosition('position:test'))->toBeFalse()
        ->and(Validators::isArbitraryVariablePosition('percentage:test'))->toBeFalse();
});

test('isArbitraryVariableShadow', function (): void {
    expect(Validators::isArbitraryVariableShadow('(shadow:test)'))->toBeTrue()
        ->and(Validators::isArbitraryVariableShadow('(test)'))->toBeTrue()
        ->and(Validators::isArbitraryVariableShadow('(other:test)'))->toBeFalse()
        ->and(Validators::isArbitraryVariableShadow('shadow:test'))->toBeFalse();
});

test('isArbitraryVariableSize', function (): void {
    expect(Validators::isArbitraryVariableSize('(size:test)'))->toBeTrue()
        ->and(Validators::isArbitraryVariableSize('(length:test)'))->toBeTrue()
        ->and(Validators::isArbitraryVariableSize('(other:test)'))->toBeFalse()
        ->and(Validators::isArbitraryVariableSize('(test)'))->toBeFalse()
        ->and(Validators::isArbitraryVariableSize('size:2px'))->toBeFalse()
        ->and(Validators::isArbitraryVariableSize('(percentage:test)'))->toBeFalse();
});

test('isArbitraryVariableWeight', function (): void {
    expect(Validators::isArbitraryVariableWeight('(weight:test)'))->toBeTrue()
        ->and(Validators::isArbitraryVariableWeight('(number:test)'))->toBeTrue()
        ->and(Validators::isArbitraryVariableWeight('(--my-weight)'))->toBeTrue()
        ->and(Validators::isArbitraryVariableWeight('(other:test)'))->toBeFalse()
        ->and(Validators::isArbitraryVariableWeight('weight:test'))->toBeFalse()
        ->and(Validators::isArbitraryVariableWeight('[weight:test]'))->toBeFalse();
});

test('isFraction', function (): void {
    expect(Validators::isFraction('1/2'))->toBeTrue()
        ->and(Validators::isFraction('123/209'))->toBeTrue()
        ->and(Validators::isFraction('1'))->toBeFalse()
        ->and(Validators::isFraction('1/2/3'))->toBeFalse()
        ->and(Validators::isFraction('[1/2]'))->toBeFalse();
});

test('isInteger', function (): void {
    expect(Validators::isInteger('1'))->toBeTrue()
        ->and(Validators::isInteger('123'))->toBeTrue()
        ->and(Validators::isInteger('8312'))->toBeTrue()
        ->and(Validators::isInteger('[8312]'))->toBeFalse()
        ->and(Validators::isInteger('[2]'))->toBeFalse()
        ->and(Validators::isInteger('[8312px]'))->toBeFalse()
        ->and(Validators::isInteger('[8312%]'))->toBeFalse()
        ->and(Validators::isInteger('[8312rem]'))->toBeFalse()
        ->and(Validators::isInteger('8312.2'))->toBeFalse()
        ->and(Validators::isInteger('1.2'))->toBeFalse()
        ->and(Validators::isInteger('one'))->toBeFalse()
        ->and(Validators::isInteger('1/2'))->toBeFalse()
        ->and(Validators::isInteger('1%'))->toBeFalse()
        ->and(Validators::isInteger('1px'))->toBeFalse();
});

test('isNumber', function (): void {
    expect(Validators::isNumber('1'))->toBeTrue()
        ->and(Validators::isNumber('123'))->toBeTrue()
        ->and(Validators::isNumber('8312'))->toBeTrue()
        ->and(Validators::isNumber('8312.2'))->toBeTrue()
        ->and(Validators::isNumber('1.2'))->toBeTrue()
        ->and(Validators::isNumber('[8312]'))->toBeFalse()
        ->and(Validators::isNumber('[2]'))->toBeFalse()
        ->and(Validators::isNumber('[8312px]'))->toBeFalse()
        ->and(Validators::isNumber('[8312%]'))->toBeFalse()
        ->and(Validators::isNumber('[8312rem]'))->toBeFalse()
        ->and(Validators::isNumber('one'))->toBeFalse()
        ->and(Validators::isNumber('1/2'))->toBeFalse()
        ->and(Validators::isNumber('1%'))->toBeFalse()
        ->and(Validators::isNumber('1px'))->toBeFalse();
});

test('isPercent', function (): void {
    expect(Validators::isPercent('1%'))->toBeTrue()
        ->and(Validators::isPercent('100.001%'))->toBeTrue()
        ->and(Validators::isPercent('.01%'))->toBeTrue()
        ->and(Validators::isPercent('0%'))->toBeTrue()
        ->and(Validators::isPercent('0'))->toBeFalse()
        ->and(Validators::isPercent('one%'))->toBeFalse();
});

test('isTshirtSize', function (): void {
    expect(Validators::isTshirtSize('xs'))->toBeTrue()
        ->and(Validators::isTshirtSize('sm'))->toBeTrue()
        ->and(Validators::isTshirtSize('md'))->toBeTrue()
        ->and(Validators::isTshirtSize('lg'))->toBeTrue()
        ->and(Validators::isTshirtSize('xl'))->toBeTrue()
        ->and(Validators::isTshirtSize('2xl'))->toBeTrue()
        ->and(Validators::isTshirtSize('2.5xl'))->toBeTrue()
        ->and(Validators::isTshirtSize('10xl'))->toBeTrue()
        ->and(Validators::isTshirtSize('2xs'))->toBeTrue()
        ->and(Validators::isTshirtSize('2lg'))->toBeTrue()
        ->and(Validators::isTshirtSize(''))->toBeFalse()
        ->and(Validators::isTshirtSize('hello'))->toBeFalse()
        ->and(Validators::isTshirtSize('1'))->toBeFalse()
        ->and(Validators::isTshirtSize('xl3'))->toBeFalse()
        ->and(Validators::isTshirtSize('2xl3'))->toBeFalse()
        ->and(Validators::isTshirtSize('-xl'))->toBeFalse();
});
