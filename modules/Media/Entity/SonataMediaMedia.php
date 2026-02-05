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
use App\Modules\Media\Entity\Translation\SonataMediaMediaTranslation;
use App\Modules\Media\Repository\SonataMediaMediaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Translatable\Translatable;
use Sonata\MediaBundle\Entity\BaseMedia;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: SonataMediaMediaRepository::class)]
#[ORM\Table(name: 'media__media')]
#[Gedmo\SoftDeleteable]
#[Gedmo\TranslationEntity(class: SonataMediaMediaTranslation::class)]
#[ApiResource]
class SonataMediaMedia extends BaseMedia implements Translatable
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
     * @var Collection<int, SonataMediaMediaTranslation>
     */
    #[ORM\OneToMany(targetEntity: SonataMediaMediaTranslation::class, mappedBy: 'object', cascade: ['persist', 'remove'])]
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
            $this->name,
            $this->description,
            $this->enabled,
            $this->providerName,
            $this->providerStatus,
            $this->providerReference,
            $this->providerMetadata,
            $this->width,
            $this->height,
            $this->length,
            $this->copyright,
            $this->authorName,
            $this->context,
            $this->cdnStatus,
            $this->cdnIsFlushable,
            $this->cdnFlushIdentifier,
            $this->cdnFlushAt,
            $this->updatedAt,
            $this->updatedBy,
            $this->createdAt,
            $this->createdBy,
            $this->deletedAt,
            $this->binaryContent,
            $this->previousProviderReference,
            $this->contentType,
            $this->size,
            $this->galleryItems,
            $this->category,
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
     * @return Collection<int, SonataMediaMediaTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(SonataMediaMediaTranslation $translation): static
    {
        if (!$this->translations->contains($translation)) {
            $this->translations->add($translation);
            $translation->setObject($this);
        }

        return $this;
    }
}
