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

namespace App\Modules\Media\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Modules\Media\Entity\Translation\SonataMediaGalleryTranslation;
use App\Modules\Media\Repository\SonataMediaGalleryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Translatable\Translatable;
use Sonata\MediaBundle\Entity\BaseGallery;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

/**
 * @phpstan-ignore missingType.generics
 */
#[ORM\Entity(repositoryClass: SonataMediaGalleryRepository::class)]
#[ORM\Table(name: 'media__gallery')]
#[Gedmo\SoftDeleteable]
#[Gedmo\TranslationEntity(class: SonataMediaGalleryTranslation::class)]
#[ApiResource]
class SonataMediaGallery extends BaseGallery implements Translatable
{
    use SoftDeleteableEntity;
    use BlameableEntity;

    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    protected ?Uuid $id = null;

    #[Gedmo\Locale]
    private ?string $locale = null;

    /**
     * @var Collection<int, SonataMediaGalleryTranslation>
     */
    #[ORM\OneToMany(targetEntity: SonataMediaGalleryTranslation::class, mappedBy: 'object', cascade: ['persist', 'remove'])]
    private Collection $translations;

    public function __construct()
    {
        parent::__construct();
        $this->translations = new ArrayCollection();
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
            $this->context,
            $this->name,
            $this->enabled,
            $this->updatedAt,
            $this->updatedBy,
            $this->createdAt,
            $this->createdBy,
            $this->deletedAt,
            $this->defaultFormat,
            $this->galleryItems,
            $this->translations,
        ] = $data;
    }

    public function setTranslatableLocale(string $locale): void
    {
        $this->locale = $locale;
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

    /**
     * @return Collection<int, SonataMediaGalleryTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(SonataMediaGalleryTranslation $translation): static
    {
        if (!$this->translations->contains($translation)) {
            $this->translations->add($translation);
            $translation->setObject($this);
        }

        return $this;
    }
}
