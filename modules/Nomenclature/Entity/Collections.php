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
use App\Modules\Nomenclature\Entity\Translation\CollectionsTranslation;
use App\Modules\Nomenclature\Repository\CollectionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Translatable\Translatable;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: CollectionsRepository::class)]
#[ORM\Table(name: 'nomenclature__collections')]
#[Gedmo\SoftDeleteable]
#[Gedmo\TranslationEntity(class: CollectionsTranslation::class)]
#[ApiResource]
class Collections implements Translatable
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

    #[Gedmo\Locale]
    private string $locale;

    /**
     * @var Collection<int, CollectionsTranslation>
     */
    #[ORM\OneToMany(targetEntity: CollectionsTranslation::class, mappedBy: 'object', cascade: ['persist', 'remove'])]
    private Collection $translations;

    /**
     * @var Collection<int, Nomenclature>
     */
    #[ORM\ManyToMany(targetEntity: Nomenclature::class, mappedBy: 'collections')]
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
            $this->id,
            $this->name,
            $this->slug,
            $this->description,
            $this->createdAt,
            $this->createdBy,
            $this->updatedAt,
            $this->updatedBy,
            $this->deletedAt,
            $this->locale,
            $this->translations,
            $this->nomenclatures,
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
     * @return Collection<int, CollectionsTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(CollectionsTranslation $translation): static
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
            $nomenclature->addCollection($this);
        }

        return $this;
    }

    public function removeNomenclature(Nomenclature $nomenclature): static
    {
        if ($this->nomenclatures->removeElement($nomenclature)) {
            $nomenclature->removeCollection($this);
        }

        return $this;
    }
}
