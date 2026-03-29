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

use App\Modules\Chat\Repository\ThreadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: ThreadRepository::class)]
#[ORM\Table(name: 'chat_thread')]
#[Gedmo\SoftDeleteable]
class Thread
{
    use SoftDeleteableEntity;
    use BlameableEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $subject = null;

    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    protected bool $isSpam = false;

    /**
     * @var Collection<int, Message>
     */
    #[ORM\OneToMany(targetEntity: Message::class, mappedBy: 'thread')]
    private Collection $messages;

    /**
     * @var Collection<int, ThreadMetadata>
     */
    #[ORM\OneToMany(targetEntity: ThreadMetadata::class, mappedBy: 'thread')]
    private Collection $metadata;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
        $this->metadata = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(?string $subject): static
    {
        $this->subject = $subject;

        return $this;
    }

    public function getIsSpam(): bool
    {
        return $this->isSpam;
    }

    public function setIsSpam(bool $isSpam): static
    {
        $this->isSpam = $isSpam;

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): static
    {
        if (!$this->messages->contains($message)) {
            $this->messages->add($message);
            $message->setThread($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): static
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getThread() === $this) {
                $message->setThread(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ThreadMetadata>
     */
    public function getMetadata(): Collection
    {
        return $this->metadata;
    }

    public function addMetadata(ThreadMetadata $metadata): static
    {
        if (!$this->metadata->contains($metadata)) {
            $this->metadata->add($metadata);
            $metadata->setThread($this);
        }

        return $this;
    }

    public function removeMetadata(ThreadMetadata $metadata): static
    {
        if ($this->metadata->removeElement($metadata)) {
            // set the owning side to null (unless already changed)
            if ($metadata->getThread() === $this) {
                $metadata->setThread(null);
            }
        }

        return $this;
    }
}
