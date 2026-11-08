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

use Symfony\Component\Workflow\Attribute\Place;

enum UserStatus: string
{
    #[Place(initial: true)]
    case NEW = 'New';
    case PENDING = 'Pending';
    case VALIDATED = 'Validated';
    case INACTIVE = 'Inactive';
    case ACTIVE = 'Active';
    case BANNED = 'Banned';
    case DISABLED = 'Disabled';
    case DELETED = 'Deleted';
}
