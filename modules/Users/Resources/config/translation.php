<?php

/**
 * KYG Framework for Business.
 *
 * @category   Configuration
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return App::config([
    'framework' => [
        'translator' => [
            'paths' => ['%kernel.project_dir%/modules/Users/Resources/translations'],
        ],
    ],
]);
