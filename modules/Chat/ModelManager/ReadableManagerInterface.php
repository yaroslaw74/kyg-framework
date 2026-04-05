<?php

/**
 * KYG Framework for Business.
 *
 * @category   Model Manager Interface
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Chat\ModelManager;

use App\Modules\Chat\Entity\Message;
use App\Modules\Chat\Entity\Thread;
use App\Modules\Users\Entity\User;

interface ReadableManagerInterface
{
    /**
     * Marks the readable as read by this participant
     * Must be applied directly to the storage,
     * without modifying the readable state.
     * We want to show the unread readables on the page,
     * as well as marking them as read.
     */
    public function markAsReadByParticipant(Thread|Message $readable, User $user): void;

    public function markAsUnreadByParticipant(Thread|Message $readable, User $user): void;
}
