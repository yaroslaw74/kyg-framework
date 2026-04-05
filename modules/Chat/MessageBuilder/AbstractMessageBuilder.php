<?php

/**
 * KYG Framework for Business.
 *
 * @category   Message Builder
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Chat\MessageBuilder;

use App\Modules\Chat\Entity\Message;
use App\Modules\Chat\Entity\Thread;
use App\Modules\Users\Entity\User;

abstract class AbstractMessageBuilder
{
    public function __construct(
        protected Message $message,
        protected Thread $thread,
    ) {
        $this->message->setThread($thread);
        $thread->addMessage($message);
    }

    public function getMessage(): Message
    {
        return $this->message;
    }

    public function setBody(string $body): static
    {
        $this->message->setBody($body);

        return $this;
    }

    public function setSender(User $sender): static
    {
        $this->message->setSender($sender);
        $this->thread->addParticipant($sender);

        return $this;
    }
}
