<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Result cache size
    |--------------------------------------------------------------------------
    |
    | Number of merge() results kept in the in-process LRU cache. Set to 0 to
    | disable caching. Repeated class lists (the common case in a request) are
    | served from cache.
    |
    */
    'cacheSize' => 500,

    /*
    |--------------------------------------------------------------------------
    | Prefix
    |--------------------------------------------------------------------------
    |
    | Matches Tailwind's prefix option (e.g. 'tw' for a `tw:` prefix). Leave
    | null for no prefix.
    |
    */
    'prefix' => null,

    /*
    |--------------------------------------------------------------------------
    | Extend / override
    |--------------------------------------------------------------------------
    |
    | Same semantics as extendTailwindMerge in the JS package. `extend` appends
    | to the default theme/classGroups; `override` replaces. See
    | Stamat\TailwindMerge\DefaultConfig::config() for the config shape.
    |
    */
    'extend' => [],

    'override' => [],
];
