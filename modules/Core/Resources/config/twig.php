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
    'twig' => [
        'paths' => [
            'modules/Core/Resources/templates' => 'Core',
        ],
    ],
]);
