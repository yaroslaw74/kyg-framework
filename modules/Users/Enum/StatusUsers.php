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

use App\Modules\Users\Enumeration\UsersStatus;
use Symfony\Contracts\Translation\TranslatorInterface;
use Yokai\EnumBundle\NativeTranslatedEnum;

class StatusUsers extends NativeTranslatedEnum
{
    public function __construct(TranslatorInterface $translator)
    {
        parent::__construct(UsersStatus::class, $translator, '%s', 'users');
    }
}
