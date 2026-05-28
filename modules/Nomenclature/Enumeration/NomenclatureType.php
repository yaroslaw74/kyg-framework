<?php

/**
 * KYG Framework for Business.
 *
 * @category   Enumeration
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Nomenclature\Enumeration;

enum NomenclatureType: string
{
    case TYPE_PRODUCT = 'Product';
    case TYPE_SERVICE = 'Service';
}
