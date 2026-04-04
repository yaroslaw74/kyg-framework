<?php

/**
 * KYG Framework for Business.
 *
 * @category   Entity
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Chat\Entity;

use App\Modules\Chat\Repository\ThreadMetadataRepository;
use App\Modules\Users\Entity\User;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: ThreadMetadataRepository::class)]
#[ORM\Table(name: 'chat__thread_metadata')]
class ThreadMetadata
{
    use BlameableEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'metadata')]
    private ?Thread $thread = null;

    #[ORM\ManyToOne]
    private ?User $participant = null;

    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    private bool $isDeleted = false;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTime $lastParticipantMessageDate;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTime $lastMessageDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getThread(): ?Thread
    {
        return $this->thread;
    }

    public function setThread(?Thread $thread): static
    {
        $this->thread = $thread;

        return $this;
    }

    public function getParticipant(): ?User
    {
        return $this->participant;
    }

    public function setParticipant(?User $participant): static
    {
        $this->participant = $participant;

        return $this;
    }

    public function getIsDeleted(): bool
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(bool $isDeleted): static
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    public function getLastParticipantMessageDate(): \DateTime
    {
        return $this->lastParticipantMessageDate;
    }

    public function setLastParticipantMessageDate(\DateTime $date): static
    {
        $this->lastParticipantMessageDate = $date;

        return $this;
    }

    public function getLastMessageDate(): \DateTime
    {
        return $this->lastMessageDate;
    }

    public function setLastMessageDate(\DateTime $date): static
    {
        $this->lastMessageDate = $date;

        return $this;
    }
}
