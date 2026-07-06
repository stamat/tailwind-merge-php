/**
 * Generates src/DefaultConfig.php from the published tailwind-merge (JS) package.
 *
 * Usage:
 *   cd bin && npm install tailwind-merge@^3 && node generate-default-config.mjs
 *
 * The JS default config is walked recursively:
 *   - strings/numbers stay literal
 *   - validator functions are matched by reference and emitted as Validators::isX(...)
 *   - theme getters are key-recovered (they read theme[key]) and emitted as new ThemeRef('key')
 */
import { getDefaultConfig, validators } from 'tailwind-merge'
import { createRequire } from 'node:module'
import { readFileSync, writeFileSync } from 'node:fs'
import { fileURLToPath } from 'node:url'
import { dirname, join } from 'node:path'

// v3 blocks the ./package.json subpath in "exports"; resolve the entry point, then walk up to the package root.
const readUpstreamVersion = () => {
    let dir = dirname(createRequire(import.meta.url).resolve('tailwind-merge'))
    for (let i = 0; i < 10; i++) {
        try {
            const pkg = JSON.parse(readFileSync(join(dir, 'package.json'), 'utf8'))
            if (pkg.name === 'tailwind-merge') return pkg.version
        } catch {}
        dir = dirname(dir)
    }
    throw new Error('Could not locate tailwind-merge package.json')
}
const upstreamVersion = readUpstreamVersion()

const validatorByRef = new Map(Object.entries(validators).map(([name, fn]) => [fn, name]))

const keyRecorder = new Proxy({}, { get: (_, key) => (typeof key === 'string' ? key : undefined) })

const indent = (level) => '    '.repeat(level)

const phpString = (value) => `'${String(value).replace(/\\/g, '\\\\').replace(/'/g, "\\'")}'`

const emit = (node, level) => {
    if (typeof node === 'string') return phpString(node)
    if (typeof node === 'number') return String(node)

    if (typeof node === 'function') {
        if (node.isThemeGetter) {
            const key = node(keyRecorder)
            if (typeof key !== 'string') throw new Error('Could not recover theme key')
            return `new ThemeRef(${phpString(key)})`
        }
        const name = validatorByRef.get(node)
        if (!name) throw new Error(`Unknown validator function: ${node}`)
        const method = name === 'isAny' ? 'isAny' : name
        return `Validators::${method}(...)`
    }

    if (Array.isArray(node)) {
        if (node.length === 0) return '[]'
        const items = node.map((item) => `${indent(level + 1)}${emit(item, level + 1)},`)
        return `[\n${items.join('\n')}\n${indent(level)}]`
    }

    if (typeof node === 'object' && node !== null) {
        const entries = Object.entries(node).map(
            ([key, value]) => `${indent(level + 1)}${phpString(key)} => ${emit(value, level + 1)},`,
        )
        return `[\n${entries.join('\n')}\n${indent(level)}]`
    }

    throw new Error(`Unsupported node type: ${typeof node}`)
}

const config = getDefaultConfig()

const configShape = 'array{cacheSize: int, theme: array<string, list<mixed>>, classGroups: array<string, list<mixed>>, conflictingClassGroups: array<string, list<string>>, conflictingClassGroupModifiers: array<string, list<string>>, postfixLookupClassGroups: list<string>, orderSensitiveModifiers: list<string>}'

const php = `<?php

declare(strict_types=1);

namespace Stamat\\TailwindMerge;

/**
 * Default Tailwind CSS v4 configuration.
 *
 * GENERATED FILE — do not edit by hand.
 * Regenerate from the upstream JS package with bin/generate-default-config.mjs
 * (source of truth: dcastil/tailwind-merge v${upstreamVersion}).
 */
final class DefaultConfig
{
    /**
     * @return ${configShape}
     */
    public static function config(): array
    {
        // Memoized: the literal rebuilds thousands of first-class-callable Closures per call.
        // Callers mutate only their own copy (PHP arrays are copy-on-write), so sharing is safe.
        /** @var ${configShape}|null $config */
        static $config = null;

        return $config ??= ${emit(config, 2)};
    }
}
`

const outPath = join(dirname(fileURLToPath(import.meta.url)), '..', 'src', 'DefaultConfig.php')
writeFileSync(outPath, php)
console.log(`Wrote ${outPath}`)
