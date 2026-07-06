<?php

declare(strict_types=1);

use Stamat\TailwindMerge\LruCache;

test('stores and retrieves values', function (): void {
    $cache = new LruCache(2);
    $cache->set('a', '1');

    expect($cache->get('a'))->toBe('1')
        ->and($cache->get('missing'))->toBeNull();
});

test('evicts least recently used entry when full', function (): void {
    $cache = new LruCache(2);
    $cache->set('a', '1');
    $cache->set('b', '2');
    $cache->set('c', '3');

    expect($cache->get('a'))->toBeNull()
        ->and($cache->get('b'))->toBe('2')
        ->and($cache->get('c'))->toBe('3');
});

test('get refreshes recency', function (): void {
    $cache = new LruCache(2);
    $cache->set('a', '1');
    $cache->set('b', '2');
    $cache->get('a');
    $cache->set('c', '3');

    expect($cache->get('a'))->toBe('1')
        ->and($cache->get('b'))->toBeNull();
});

test('set on existing key updates value without eviction', function (): void {
    $cache = new LruCache(2);
    $cache->set('a', '1');
    $cache->set('b', '2');
    $cache->set('a', 'updated');

    expect($cache->get('a'))->toBe('updated')
        ->and($cache->get('b'))->toBe('2');
});

test('size zero disables caching', function (): void {
    $cache = new LruCache(0);
    $cache->set('a', '1');

    expect($cache->get('a'))->toBeNull();
});
