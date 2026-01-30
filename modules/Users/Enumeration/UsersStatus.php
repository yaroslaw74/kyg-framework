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

namespace App\Modules\Users\Enumeration;

enum UsersStatus: string
{
    case STATUS_NEW = 'New';
    case STATUS_ACTIVE = 'Active';
    case STATUS_BANNED = 'Banned';
    case STATUS_PENDING = 'Pending';
    case STATUS_IN_ACTIVE = 'In Active';
    case STATUS_DELETED = 'Deleted';
}
