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

namespace App\Modules\Classification\Entity;

use App\Modules\Classification\Repository\ClassificationContextRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: ClassificationContextRepository::class)]
#[ORM\Table(name: 'classification__context')]
#[Gedmo\SoftDeleteable]
class ClassificationContext
{
    use SoftDeleteableEntity;
    use BlameableEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    private ?Uuid $id = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $name = null;

    /**
     * @var Collection<int, ClassificationCategory>
     */
    #[ORM\OneToMany(targetEntity: ClassificationCategory::class, mappedBy: 'context', cascade: ['remove'])]
    private Collection $categories;

    /**
     * @var Collection<int, ClassificationCollection>
     */
    #[ORM\OneToMany(targetEntity: ClassificationCollection::class, mappedBy: 'context', cascade: ['remove'])]
    private Collection $collections;

    /**
     * @var Collection<int, ClassificationTag>
     */
    #[ORM\OneToMany(targetEntity: ClassificationTag::class, mappedBy: 'context', cascade: ['remove'])]
    private Collection $tags;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->collections = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getName() ?? 'n/a';
    }

    public function __serialize(): array
    {
        $data = (array) $this;

        return $data;
    }

    /**
     * @param mixed[] $data
     */
    public function __unserialize(array $data): void
    {
        [
            $this->id,
            $this->name,
            $this->createdAt,
            $this->createdBy,
            $this->updatedAt,
            $this->updatedBy,
            $this->deletedAt,
            $this->categories,
            $this->collections,
            $this->tags,
        ] = $data;
    }

    public function getId(): ?string
    {
        if (null !== $this->id) {
            return $this->id->toString();
        }

        return null;
    }

    public function getUuid(): ?Uuid
    {
        return $this->id;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return Collection<int, ClassificationCategory>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(ClassificationCategory $category): static
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
            $category->setContext($this);
        }

        return $this;
    }

    public function removeCategory(ClassificationCategory $category): static
    {
        $this->categories->removeElement($category);

        return $this;
    }

    /**
     * @return Collection<int, ClassificationCollection>
     */
    public function getCollections(): Collection
    {
        return $this->collections;
    }

    public function addCollection(ClassificationCollection $collection): static
    {
        if (!$this->collections->contains($collection)) {
            $this->collections->add($collection);
            $collection->setContext($this);
        }

        return $this;
    }

    public function removeCollection(ClassificationCollection $collection): static
    {
        $this->collections->removeElement($collection);

        return $this;
    }

    /**
     * @return Collection<int, ClassificationTag>
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addClassificationTag(ClassificationTag $tag): static
    {
        if (!$this->tags->contains($tag)) {
            $this->tags->add($tag);
            $tag->setContext($this);
        }

        return $this;
    }

    public function removeTag(ClassificationTag $tag): static
    {
        $this->tags->removeElement($tag);

        return $this;
    }
}
