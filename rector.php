<?php
declare(strict_types=1);
use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/config',
        __DIR__ . '/modules',
        __DIR__ . '/public',
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->withRootFiles()
    ->withRules([TypedPropertyFromStrictConstructorRector::class])
    ->withComposerBased(twig: true, doctrine: true, phpunit: true, symfony: true)
    ->withPreparedSets(deadCode: true, codeQuality: true)
    ->withCache(__DIR__ . '/var/rector')
    ->withSymfonyContainerPhp(
        __DIR__ . '/var/cache/dev/App_KernelDevDebugContainer.php'
    );
