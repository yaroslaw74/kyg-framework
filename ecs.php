<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use PhpCsFixer\Fixer\ListNotation\ListSyntaxFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    ->withPaths(array(
        __DIR__ . '/assets',
        __DIR__ . '/config',
        __DIR__ . '/public',
        __DIR__ . '/src',
        __DIR__ . '/modules',
        __DIR__ . '/tests',
    ))
    ->withConfiguredRule(
        ArraySyntaxFixer::class,
        array(
            'syntax' => 'long',
        )
    )

    // add a single rule
    ->withRules(array(
        ListSyntaxFixer::class,
    ))

    // add sets - group of rules, from easiest to more complex ones
    // uncomment one, apply one, commit, PR, merge and repeat
    ->withPreparedSets(
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
