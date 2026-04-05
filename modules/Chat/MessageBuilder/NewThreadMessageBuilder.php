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

use App\Modules\Users\Entity\User;
use Doctrine\Common\Collections\Collection;

class NewThreadMessageBuilder extends AbstractMessageBuilder
{
    public function setSubject(string $subject): static
    {
        $this->thread->setSubject($subject);

        return $this;
    }

    public function addRecipient(User $recipient): static
    {
        $this->thread->addParticipant($recipient);

        return $this;
    }

    /**
     * @param Collection<int, User> $recipients
     */
    public function addRecipients(Collection $recipients): static
    {
        foreach ($recipients as $recipient) {
            $this->addRecipient($recipient);
        }

        return $this;
    }
}
