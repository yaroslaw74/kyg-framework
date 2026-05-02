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

namespace App\Modules\Nomenclature\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Modules\Nomenclature\Entity\Translation\CategoriesTranslation;
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

#[ORM\Entity(repositoryClass: SortableRepository::class)]
#[ORM\Table(name: 'nomenclature__categories')]
#[Gedmo\SoftDeleteable]
#[Gedmo\TranslationEntity(class: CategoriesTranslation::class)]
#[ApiResource]
class Categories implements Sortable, Translatable
{
    use BlameableEntity;
    use SoftDeleteableEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

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

    #[Gedmo\Locale]
    private string $locale;

    /**
     * @var Collection<int, CategoriesTranslation>
     */
    #[ORM\OneToMany(targetEntity: CategoriesTranslation::class, mappedBy: 'object', cascade: ['persist', 'remove'])]
    private Collection $translations;

    /**
     * @var Collection<int, Nomenclature>
     */
    #[ORM\OneToMany(targetEntity: Nomenclature::class, mappedBy: 'category')]
    private Collection $nomenclatures;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
        $this->nomenclatures = new ArrayCollection();
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
            $this->createdAt,
            $this->createdBy,
            $this->updatedAt,
            $this->updatedBy,
            $this->deletedAt,
            $this->id,
            $this->name,
            $this->slug,
            $this->description,
            $this->position,
            $this->children,
            $this->parent,
            $this->locale,
            $this->translations,
            $this->nomenclatures,
        ] = $data;
    }

    public function getId(): ?int
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

    public function getTranslatableLocale(): string
    {
        return $this->locale;
    }

    public function setTranslatableLocale(string $locale): static
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return Collection<int, CategoriesTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(CategoriesTranslation $translation): static
    {
        if (!$this->translations->contains($translation)) {
            $this->translations->add($translation);
            $translation->setObject($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Nomenclature>
     */
    public function getNomenclatures(): Collection
    {
        return $this->nomenclatures;
    }

    public function addNomenclature(Nomenclature $nomenclature): static
    {
        if (!$this->nomenclatures->contains($nomenclature)) {
            $this->nomenclatures->add($nomenclature);
            $nomenclature->setCategory($this);
        }

        return $this;
    }

    public function removeNomenclature(Nomenclature $nomenclature): static
    {
        if ($this->nomenclatures->removeElement($nomenclature)) {
            // set the owning side to null (unless already changed)
            if ($nomenclature->getCategory() === $this) {
                $nomenclature->setCategory(null);
            }
        }

        return $this;
    }
}
