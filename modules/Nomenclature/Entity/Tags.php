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
use App\Modules\Nomenclature\Entity\Translation\TagsTranslation;
use App\Modules\Nomenclature\Repository\TagsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Translatable\Translatable;

#[ORM\Entity(repositoryClass: TagsRepository::class)]
#[ORM\Table(name: 'nomenclature__tags')]
#[Gedmo\SoftDeleteable]
#[Gedmo\TranslationEntity(class: TagsTranslation::class)]
#[ApiResource]
class Tags implements Translatable
{
    use SoftDeleteableEntity;
    use BlameableEntity;
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

    #[Gedmo\Locale]
    private string $locale;

    /**
     * @var Collection<int, TagsTranslation>
     */
    #[ORM\OneToMany(targetEntity: TagsTranslation::class, mappedBy: 'object', cascade: ['persist', 'remove'])]
    private Collection $translations;

    /**
     * @var Collection<int, Nomenclature>
     */
    #[ORM\ManyToMany(targetEntity: Nomenclature::class, mappedBy: 'tags')]
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

    /**
     * Ensure the session doesn't contain actual password hashes by CRC32C-hashing them, as supported since Symfony 7.3.
     */
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
     * @return Collection<int, TagsTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(TagsTranslation $translation): static
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
            $nomenclature->addTag($this);
        }

        return $this;
    }

    public function removeNomenclature(Nomenclature $nomenclature): static
    {
        if ($this->nomenclatures->removeElement($nomenclature)) {
            $nomenclature->removeTag($this);
        }

        return $this;
    }
}
