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
use Symfony\Config\TwigConfig;

return static function (TwigConfig $twig): void {
    $twig->path('modules/Charts/Resources/templates', 'Charts');
};
