<?php

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
        __DIR__.'/src/Kernel.php',
        __DIR__.'/importmap.php',
        __DIR__.'/modules/Users/Entity/ResetPasswordRequest.php',
    ])
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
        naming: true,
        rectorPreset: false
    )
    ->withCache(__DIR__.'/var/rector')
    ->withSymfonyContainerPhp(
        __DIR__.'/var/cache/dev/App_KernelDevDebugContainer.php'
    );
