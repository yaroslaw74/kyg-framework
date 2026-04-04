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

use App\Modules\Chat\Model\ThreadInterface;
use App\Modules\Chat\Repository\ThreadRepository;
use App\Modules\Users\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: ThreadRepository::class)]
#[ORM\Table(name: 'chat__thread')]
class Thread implements ThreadInterface
{
    use BlameableEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $subject = null;

    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    private bool $isSpam = false;

    /**
     * @var Collection<int, Message>
     */
    #[ORM\OneToMany(targetEntity: Message::class, mappedBy: 'thread')]
    private Collection $messages;

    /**
     * @var Collection<int, ThreadMetadata>
     */
    #[ORM\OneToMany(targetEntity: ThreadMetadata::class, mappedBy: 'thread', cascade: ['all'])]
    private Collection $metadata;

    /**
     * @var Collection<int, User>
     */
    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'thread')]
    private Collection $participants;

    #[ORM\Column(type: Types::STRING, options: ['default' => ''])]
    private string $keywords = '';

    public function __construct()
    {
        $this->messages = new ArrayCollection();
        $this->metadata = new ArrayCollection();
        $this->participants = new ArrayCollection();
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

    public function getFirstMessage(): Message
    {
        return $this->getMessages()->first();
    }

    public function getLastMessage(): Message
    {
        return $this->getMessages()->last();
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

    public function isDeletedByParticipant(User $participant): bool
    {
        if ($metadata = $this->getMetadataForParticipant($participant)) {
            return $metadata->getIsDeleted();
        }

        return false;
    }

    public function setIsDeletedByParticipant(User $participant, bool $isDeleted): static
    {
        if (!$metadata = $this->getMetadataForParticipant($participant)) {
            throw new \InvalidArgumentException(sprintf('No metadata exists for participant with id "%s"', $participant->getId()));
        }

        $metadata->setIsDeleted($isDeleted);

        if ($isDeleted) {
            // also mark all thread messages as read
            foreach ($this->getMessages() as $message) {
                $message->setIsReadByParticipant($participant, true);
            }
        }

        return $this;
    }

    public function setIsDeleted(bool $isDeleted): static
    {
        foreach ($this->getParticipants() as $participant) {
            $this->setIsDeletedByParticipant($participant, $isDeleted);
        }

        return $this;
    }

    public function isReadByParticipant(User $participant): bool
    {
        foreach ($this->getMessages() as $message) {
            if (!$message->isReadByParticipant($participant)) {
                return false;
            }
        }

        return true;
    }

    public function setIsReadByParticipant(User $participant, bool $isRead): static
    {
        foreach ($this->getMessages() as $message) {
            $message->setIsReadByParticipant($participant, $isRead);
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

    /**
     * @return Collection<int, ThreadMetadata>
     */
    public function getAllMetadata(): Collection
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

    public function getMetadataForParticipant(User $participant): ?ThreadMetadata
    {
        foreach ($this->metadata as $meta) {
            if ($meta->getParticipant()->getId() == $participant->getId()) {
                return $meta;
            }
        }

        return null;
    }

    /**
     * Get the participants this participant is talking with.
     *
     * @return array<int, User>
     */
    public function getOtherParticipants(User $participant): array
    {
        $otherParticipants = $this->getParticipants();

        $key = array_search($participant, $otherParticipants, true);

        if (false !== $key) {
            unset($otherParticipants[$key]);
        }

        // we want to reset the array indexes
        return array_values($otherParticipants);
    }

    /**
     * @return array<int, User>|Collection<int, User>
     */
    public function getParticipants(): array|Collection
    {
        return $this->getParticipantsCollection()->toArray();
    }

    /**
     * @return Collection<int, User>
     */
    protected function getParticipantsCollection(): Collection
    {
        if (null == $this->participants) {
            foreach ($this->metadata as $data) {
                $this->participants->add($data->getParticipant());
            }
        }

        return $this->participants;
    }

    public function addParticipant(User $participant): static
    {
        if (!$this->isParticipant($participant)) {
            $this->getParticipantsCollection()->add($participant);
        }

        return $this;
    }

    /**
     * @param array<int, User>|\Traversable<User> $participants
     */
    public function addParticipants(array|\Traversable $participants): static
    {
        /*
         * @phpstan-ignore instanceof.alwaysTrue, booleanAnd.alwaysFalse
         */
        if (!\is_array($participants) && !$participants instanceof \Traversable) {
            throw new \InvalidArgumentException('Participants must be an array or instance of Traversable');
        }

        foreach ($participants as $participant) {
            $this->addParticipant($participant);
        }

        return $this;
    }

    public function isParticipant(User $participant): bool
    {
        return $this->getParticipantsCollection()->contains($participant);
    }

    public function removeParticipant(User $participant): static
    {
        if ($this->participants->removeElement($participant)) {
            // set the owning side to null (unless already changed)
            if ($participant->getThread() === $this) {
                $participant->setThread(null);
            }
        }

        return $this;
    }

    public function getKeywords(): string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): static
    {
        $this->keywords = $keywords;

        return $this;
    }
}
