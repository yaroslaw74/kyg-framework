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

use App\Modules\Chat\Entity\Message;
use App\Modules\Users\Entity\User;
use Doctrine\Common\Collections\Collection;

interface ThreadInterface extends ReadableInterface
{
    public function getId(): ?int;

    public function getSubject(): ?string;

    public function setSubject(?string $subject): static;

    /**
     * Gets the messages contained in the thread.
     *
     * @return Collection<int, Message>
     */
    public function getMessages(): Collection;

    public function addMessage(Message $message): static;

    public function getFirstMessage(): Message;

    public function getLastMessage(): Message;

    /**
     * Gets the users participating in this conversation.
     *
     * @return array<int, User>|Collection<int, User>
     */
    public function getParticipants(): Collection|array;

    public function isParticipant(User $participant): bool;

    public function addParticipant(User $participant): static;

    public function isDeletedByParticipant(User $participant): bool;

    public function setIsDeletedByParticipant(User $participant, bool $isDeleted): static;

    public function setIsDeleted(bool $isDeleted): static;

    /**
     * Get the participants this participant is talking with.
     *
     * @return array<int, User>
     */
    public function getOtherParticipants(User $participant): array;
}
