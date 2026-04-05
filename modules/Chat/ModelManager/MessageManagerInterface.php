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
use App\Modules\Users\Entity\User;

interface MessageManagerInterface extends ReadableManagerInterface
{
    public function getNbUnreadMessageByParticipant(User $participant): int;

    public function createMessage(): Message;

    public function saveMessage(Message $message, bool $andFlush = true): void;
}
