<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->importNames();
    $rectorConfig->import(__DIR__ . '/vendor/sylius/sylius-rector/config/config.php');
    $rectorConfig->paths([
        __DIR__ . '/modules',
        __DIR__ . '/src',
        __DIR__ . '/test',
        __DIR__ . '/public/additions',
    ]);
};
