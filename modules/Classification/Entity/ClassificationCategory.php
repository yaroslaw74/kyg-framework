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

use ApiPlatform\Metadata\ApiResource;
use App\Modules\Classification\Repository\ClassificationCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: ClassificationCategoryRepository::class)]
#[ORM\Table(name: 'classification__category')]
#[Gedmo\SoftDeleteable]
#[ApiResource]
class ClassificationCategory
{
    use SoftDeleteableEntity;
    use BlameableEntity;

    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    private ?Uuid $id = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    #[Gedmo\Slug(fields: ['name'])]
    private ?string $slug = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    protected ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    protected ?\DateTimeInterface $updatedAt = null;

    private ?int $position = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'parent')]
    private Collection $children;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'children')]
    private ?self $parent = null;

    #[ORM\ManyToOne(inversedBy: 'categories')]
    private ?ClassificationContext $context = null;

    public function __construct()
    {
        $this->children = new ArrayCollection();
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
            $this->slug,
            $this->description,
            $this->createdAt,
            $this->createdBy,
            $this->updatedAt,
            $this->updatedBy,
            $this->deletedAt,
            $this->position,
            $this->children,
            $this->parent,
            $this->context,
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function prePersist(): void
    {
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
    }

    public function preUpdate(): void
    {
        $this->setUpdatedAt(new \DateTime());
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setPosition(?int $position): void
    {
        $this->position = $position;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent, bool $nested = false): static
    {
        $this->parent = $parent;

        if (!$nested && null !== $parent) {
            $parent->addChild($this, true);
        }

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(self $child, bool $nested = false): static
    {
        if (!$this->children->contains($child)) {
            $this->children->add($child);
        }

        if (!$nested) {
            $child->setParent($this, true);
        }

        return $this;
    }

    public function removeChild(self $childToDelete): static
    {
        if ($this->children->removeElement($childToDelete)) {
            // set the owning side to null (unless already changed)
            if ($childToDelete->getParent() === $this) {
                $childToDelete->setParent(null);
            }
        }

        return $this;
    }

    public function getContext(): ?ClassificationContext
    {
        return $this->context;
    }

    public function setContext(?ClassificationContext $context): static
    {
        $this->context = $context;

        return $this;
    }
}
