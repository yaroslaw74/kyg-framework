<?php

/**
 * KYG Framework for Business.
 *
 * @category   Enum
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Users\Enum;

enum UsersStatus: string
{
    case New = 'New';
    case Pending = 'Pending';
    case Validated = 'Validated';
    case Inactive = 'Inactive';
    case Active = 'Active';
    case Banned = 'Banned';
    case Disabled = 'Disabled';
    case Deleted = 'Deleted';
}
