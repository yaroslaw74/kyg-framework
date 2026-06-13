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

    ->withRootFiles()
    ->withPhpSets()
    ->withComposerBased(twig: true, doctrine: true, phpunit: true, symfony: true)
    ->withPreparedSets(deadCode: true)
    ->withCache(__DIR__.'/var/rector')
    ->withSymfonyContainerPhp(
        __DIR__.'/var/cache/dev/App_KernelDevDebugContainer.php'
    );
