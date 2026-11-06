<?php

/**
 * KYG Framework for Business.
 *
 * @category   Rector
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/config',
        __DIR__.'/modules',
        __DIR__.'/public',
        __DIR__.'/src',
        __DIR__.'/tests',
    ])
    ->withSkip([
        __DIR__.'/config/bundles.php',
        __DIR__.'/config/preload.php',
        __DIR__.'/config/reference.php',
        __DIR__.'/importmap.php',
    ])
    // uncomment to reach your current PHP version
    ->withRootFiles()
    ->withPhpSets()
    ->withComposerBased(
        twig: true,
        doctrine: true,
        phpunit: true,
        symfony: true
    )
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        codingStyle: true,
        typeDeclarations: true,
        privatization: true,
        rectorPreset: false
    )
    ->withCache(__DIR__.'/var/rector')
    ->withSymfonyContainerPhp(
        __DIR__.'/var/cache/dev/App_KernelDevDebugContainer.php'
    );
