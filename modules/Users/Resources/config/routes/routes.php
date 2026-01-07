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
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return static function (RoutingConfigurator $routes): void {
    $routes->import(
        ['path' => '../../../Controller/', 'namespace' => 'App\Modules\Users\Controller'],
        'attribute',
    );
};
