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

use App\Modules\Chat\Repository\MessageRepository;
use App\Modules\Users\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
#[ORM\Table(name: 'chat_message')]
#[Gedmo\SoftDeleteable]
class Message
{
    use SoftDeleteableEntity;
    use BlameableEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $body = null;

    #[ORM\ManyToOne(inversedBy: 'messages')]
    private ?Thread $thread = null;

    #[ORM\ManyToOne]
    private ?User $sender = null;

    /**
     * @var Collection<int, MessageMetadata>
     */
    #[ORM\OneToMany(targetEntity: MessageMetadata::class, mappedBy: 'message', cascade: ['all'])]
    private Collection $metadata;

    public function __construct()
    {
        $this->metadata = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(?string $body): static
    {
        $this->body = $body;

        return $this;
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

    public function getSender(): ?User
    {
        return $this->sender;
    }

    public function setSender(?User $sender): static
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * @return Collection<int, MessageMetadata>
     */
    public function getMetadata(): Collection
    {
        return $this->metadata;
    }

    public function addMetadata(MessageMetadata $metadata): static
    {
        if (!$this->metadata->contains($metadata)) {
            $this->metadata->add($metadata);
            $metadata->setMessage($this);
        }

        return $this;
    }

    public function removeMetadata(MessageMetadata $metadata): static
    {
        if ($this->metadata->removeElement($metadata)) {
            // set the owning side to null (unless already changed)
            if ($metadata->getMessage() === $this) {
                $metadata->setMessage(null);
            }
        }

        return $this;
    }
}
