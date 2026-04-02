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
use App\Interfaces\CodeInterface;
use App\Modules\Nomenclature\Entity\Translation\NomenclatureTranslation;
use App\Modules\Nomenclature\Repository\NomenclatureRepository;
use App\Modules\System\Entity\Files;
use App\Traits\CodeTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Sortable\Sortable;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Translatable\Translatable;

#[ORM\Entity(repositoryClass: NomenclatureRepository::class)]
#[ORM\Table(name: 'nomenclature__nomenclature')]
#[Gedmo\SoftDeleteable]
#[Gedmo\TranslationEntity(class: NomenclatureTranslation::class)]
#[ApiResource]
class Nomenclature implements Sortable, Translatable, CodeInterface
{
    use SoftDeleteableEntity;
    use BlameableEntity;
    use TimestampableEntity;
    use CodeTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    #[Gedmo\Translatable]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Gedmo\Translatable]
    private ?string $description = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    #[Gedmo\SortablePosition]
    private ?int $position = null;

    /**
     * @var Collection<int, Files>
     */
    #[ORM\ManyToMany(targetEntity: Files::class)]
    #[ORM\JoinTable(name: 'nomenclature__images')]
    #[ORM\JoinColumn(name: 'nomenclature_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'images_id', referencedColumnName: 'id')]
    private Collection $images;

    #[Gedmo\Locale]
    private string $locale;

    /**
     * @var Collection<int, NomenclatureTranslation>
     */
    #[ORM\OneToMany(targetEntity: NomenclatureTranslation::class, mappedBy: 'object', cascade: ['persist', 'remove'])]
    private Collection $translations;

    #[ORM\ManyToOne(targetEntity: Categories::class, inversedBy: 'nomenclatures')]
    private ?Categories $category = null;

    /**
     * @var Collection<int, Collections>
     */
    #[ORM\ManyToMany(targetEntity: Collections::class, inversedBy: 'nomenclatures')]
    #[ORM\JoinTable(name: 'nomenclature__collections_nomenclature')]
    #[ORM\JoinColumn(name: 'nomenclature_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'collections_id', referencedColumnName: 'id')]
    private Collection $collections;

    /**
     * @var Collection<int, Tags>
     */
    #[ORM\ManyToMany(targetEntity: Tags::class, inversedBy: 'nomenclatures')]
    #[ORM\JoinTable(name: 'nomenclature__tags_nomenclature')]
    #[ORM\JoinColumn(name: 'nomenclature_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'tags_id', referencedColumnName: 'id')]
    private Collection $tags;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->translations = new ArrayCollection();
        $this->collections = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->addCode();
    }

    public function __toString(): string
    {
        return $this->getName();
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
            $this->description,
            $this->position,
            $this->createdAt,
            $this->createdBy,
            $this->updatedAt,
            $this->updatedBy,
            $this->deletedAt,
            $this->images,
            $this->locale,
            $this->translations,
            $this->category,
            $this->collections,
            $this->tags,
            $this->code,
        ] = $data;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
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

    /**
     * @return Collection<int, Files>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Files $image): static
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
        }

        return $this;
    }

    public function removeImage(Files $image): static
    {
        $this->images->removeElement($image);

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
     * @return Collection<int, NomenclatureTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(NomenclatureTranslation $translation): static
    {
        if (!$this->translations->contains($translation)) {
            $this->translations->add($translation);
            $translation->setObject($this);
        }

        return $this;
    }

    public function getCategory(): ?Categories
    {
        return $this->category;
    }

    public function setCategory(?Categories $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, Collections>
     */
    public function getCollections(): Collection
    {
        return $this->collections;
    }

    public function addCollection(Collections $collection): static
    {
        if (!$this->collections->contains($collection)) {
            $this->collections->add($collection);
        }

        return $this;
    }

    public function removeCollection(Collections $collection): static
    {
        $this->collections->removeElement($collection);

        return $this;
    }

    /**
     * @return Collection<int, Tags>
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tags $tag): static
    {
        if (!$this->tags->contains($tag)) {
            $this->tags->add($tag);
        }

        return $this;
    }

    public function removeTag(Tags $tag): static
    {
        $this->tags->removeElement($tag);

        return $this;
    }
}
