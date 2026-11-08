<?php

/**
 * KYG Framework for Business.
 *
 * @category   Routes
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace Symfony\Component\Routing\Loader\Configurator;

return Routes::config([
    'core' => [
        'resource' => '../../../Controller/',
        'type' => 'attribute',
    ],
]);
