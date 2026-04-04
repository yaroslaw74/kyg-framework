<?php

/**
 * KYG Framework for Business.
 *
 * @category   Model Interface
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Chat\Model;

use App\Modules\Users\Entity\User;

interface ReadableInterface
{
    public function isReadByParticipant(User $participant): bool;

    public function setIsReadByParticipant(User $participant, bool $isRead): static;
}
