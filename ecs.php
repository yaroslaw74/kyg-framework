<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use PhpCsFixer\Fixer\ListNotation\ListSyntaxFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    ->withPaths([
        __DIR__.'/assets',
        __DIR__.'/config',
        __DIR__.'/public',
        __DIR__.'/src',
        __DIR__.'/modules',
        __DIR__.'/tests',
    ])
    ->withSkip([
        ArraySyntaxFixer::class => [
            __DIR__.'/config/bundles.php',
            __DIR__.'/config/preload.php',
            __DIR__.'/config/preload.php',
            __DIR__.'/config/reference.php',
            __DIR__.'/importmap.php',
            __DIR__.'/public/index.php',
            __DIR__.'/tests/bootstrap.php',
            __DIR__.'tests/console-application.php',
            __DIR__.'/tests/object-manager.php',
        ],
    ])
    ->withConfiguredRule(
        ArraySyntaxFixer::class,
        [
            'syntax' => 'long',
        ]
    )

    // add a single rule
    ->withRules([
        ListSyntaxFixer::class,
    ])

    // add sets - group of rules, from easiest to more complex ones
    // uncomment one, apply one, commit, PR, merge and repeat
    ->withPreparedSets(
        psr12: true,
        spaces: true,
        namespaces: true,
        docblocks: true,
        arrays: true,
        comments: true,
    )
    ->withPhpCsFixerSets(
        perCS20: true,
        doctrineAnnotation: true,
        symfony: true,
    )
    ->withRootFiles()
;
