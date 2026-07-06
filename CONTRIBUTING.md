# Contributing

Thanks for helping. Read [AGENTS.md](AGENTS.md) first — it holds the core principles this project is built on.

## AI pull requests are welcome

This repo was built with AI, and AI-authored PRs are fine — held to the same bar as any other:

- **Upstream is the spec.** Behavior is defined by the JS [tailwind-merge](https://github.com/dcastil/tailwind-merge), not by taste. When in doubt, match upstream — don't invent.
- **Test-driven, heavily.** No behavior change lands without a case that fails before and passes after. Add merge cases to `tests/Fixtures/merge-cases.json` (verified against the real JS implementation) or a Pest test. A PR with no test isn't reviewable.

## Before opening a PR

```sh
composer test        # pest
composer test:types  # phpstan level max
composer lint        # pint
```

All three green. No PHPStan baseline, no skipped tests.

- **Don't edit `src/DefaultConfig.php` by hand** — it's generated. To change defaults, bump `bin/package.json`, then `cd bin && npm install && node generate-default-config.mjs`. CI fails on drift.
- Keep it defensive: `strict_types`, `final` classes, no new runtime dependencies.
- Reuse existing pieces (`Parser`, `ClassMap`, `Validators`, `ConfigMerger`) — don't fork logic into `TailwindMerge`.

## PR description

Say what changed and why, and link the upstream behavior it matches. If a merge case changed, note the input and expected output.
