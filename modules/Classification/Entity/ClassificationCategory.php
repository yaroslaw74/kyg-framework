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
use App\Modules\Classification\Entity\Translation\CategoryTranslation;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Sortable\Entity\Repository\SortableRepository;
use Gedmo\Sortable\Sortable;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Translatable\Translatable;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: SortableRepository::class)]
#[ORM\Table(name: 'classification__category')]
#[Gedmo\SoftDeleteable]
#[Gedmo\TranslationEntity(class: CategoryTranslation::class)]
#[ApiResource]
class ClassificationCategory implements Sortable, Translatable
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
    #[Gedmo\Translatable]
    private ?string $name = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    #[Gedmo\Slug(fields: ['name'])]
    private ?string $slug = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    #[Gedmo\Translatable]
    private ?string $description = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    #[Gedmo\SortablePosition]
    private ?int $position = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'parent')]
    private Collection $children;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'children')]
    #[Gedmo\SortableGroup]
    private ?self $parent = null;

    #[ORM\ManyToOne(targetEntity: ClassificationContext::class, inversedBy: 'categories')]
    #[ORM\JoinColumn(nullable: false, onDelete: 'RESTRICT')]
    private ClassificationContext $context;

    #[Gedmo\Locale]
    private string $locale;

    /**
     * @var Collection<int, CategoryTranslation>
     */
    #[ORM\OneToMany(targetEntity: CategoryTranslation::class, mappedBy: 'object', cascade: ['persist', 'remove'])]
    private Collection $translations;

    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->translations = new ArrayCollection();
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
            $this->locale,
            $this->translations,
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

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setPosition(?int $position): static
    {
        $this->position = $position;

        return $this;
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

    public function getContext(): ClassificationContext
    {
        return $this->context;
    }

    public function setContext(ClassificationContext $context): static
    {
        $this->context = $context;

        return $this;
    }

    /**
     * @return Collection<int, CategoryTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(CategoryTranslation $translation): static
    {
        if (!$this->translations->contains($translation)) {
            $this->translations->add($translation);
            $translation->setObject($this);
        }

        return $this;
    }
}
