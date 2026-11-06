<?php
/**
 * KYG Framework for Business.
 *
 * @category   PHP CS Fixer
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);
use PhpCsFixer\Finder;
use PhpCsFixer\Config;

$finder = new Finder();
$finder
    ->in(__DIR__)
    ->exclude('var')
    ->notPath([
        'config/bundles.php',
        'config/preload.php',
        'config/reference.php',
    ])
;
$config = new Config();
return $config
    ->setRules([
        '@Symfony' => true,
    ])
    ->setFinder($finder)
;
