# AGENTS.md

`stamat/tailwind-merge-php` — PHP port of [dcastil/tailwind-merge](https://github.com/dcastil/tailwind-merge). Merges Tailwind class lists, last-wins per class group. Ported from JS source, not a fork.

## Principles

1. **Upstream is the spec.** Match the JS `tailwind-merge`, not taste. `tests/Fixtures/merge-cases.json` = cases verified against real JS.
2. **Tailwind v4 only** (to v4.3). No v3 config surface. Leading `!` important is still parsed — matches upstream.
3. **Defensive.** `strict_types`, `final` classes, PHPStan level max, throw `InvalidArgumentException` on bad config keys / non-string entries. Don't loosen.
4. **Fast hot path.** Trie built once per instance, native `str_*` over regex, LRU result cache. No new allocations/regex in `merge()` without cause.
5. **Framework-agnostic core, zero runtime deps.** This is a plain PHP package first, a Laravel plugin second. Core needs only PHP `^8.2` — no framework references, no `illuminate/*` outside `src/Laravel/`. That dir is the only bridge and must degrade to nothing when Laravel is absent. Never add a hard dependency or couple the core to a framework.
6. **Reuse, don't re-roll.** Parse → [Parser](src/Parser.php), lookup → [ClassMap](src/ClassMap.php), validate → [Validators](src/Validators.php), config merge → [ConfigMerger](src/ConfigMerger.php). Extend the piece; don't fork logic into `TailwindMerge`.

## Hard rules

- **`src/DefaultConfig.php` is generated — never edit by hand.** Bump: edit `bin/package.json`, then `cd bin && npm install && node generate-default-config.mjs`. CI fails on drift.
- **New behavior needs a case** in `merge-cases.json` or a Pest test.
- API: `TailwindMerge::instance() | ::create($config) | new TailwindMerge($full)`, `->merge(...)`. Config mirrors JS `extendTailwindMerge` (`extend` appends, `override` replaces).

## Architecture

`Parser` (modifiers + base + important/arbitrary) → `ClassMap` trie (base → group) → `merge()` keeps last per group, per modifier. `LruCache` memoizes whole strings. `ConfigMerger` folds `extend`/`override` into `DefaultConfig`. Laravel glue in `src/Laravel/` (auto-discovered provider, `@twMerge` directive, `TwMerge` facade) — one shared instance.

## Commands

```sh
composer test        # pest
composer test:types  # phpstan level max
composer lint        # pint
```
