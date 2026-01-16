<?php

/**
 * KYG Framework for Business.
 *
 * @category   Config
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

use Symfony\Config\DoctrineConfig;

return static function (DoctrineConfig $doctrine): void {
    $emDefault = $doctrine->orm()->entityManager('default');
    $emDefault->mapping('SomeEntityNamespace')
        ->type('attribute')
        ->dir('%kernel.project_dir%/modules/Media/Entity')
        ->isBundle(false)
        ->prefix('App\Modules\Media\Entity')
        ->alias('Media')
    ;
};
