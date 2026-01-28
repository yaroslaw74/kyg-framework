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
use App\Modules\Classification\Entity\FAQCategory\SonataClassificationCategoryTranslation;
use App\Modules\Classification\Repository\SonataClassificationCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Translatable\Translatable;
use Sonata\ClassificationBundle\Entity\BaseCategory;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: SonataClassificationCategoryRepository::class)]
#[ORM\Table(name: 'classification__category')]
#[Gedmo\SoftDeleteable]
#[ApiResource]
class SonataClassificationCategory extends BaseCategory implements Translatable
{
    use SoftDeleteableEntity;
    use BlameableEntity;

    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    protected ?Uuid $id = null;

    /**
     * @var Collection<int, SonataClassificationCategoryTranslation>
     */
    #[ORM\OneToMany(targetEntity: SonataClassificationCategoryTranslation::class, mappedBy: 'object', cascade: ['persist', 'remove'])]
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
            $this->slug,
            $this->enabled,
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

    /**
     * @return Collection<int, SonataClassificationCategoryTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(SonataClassificationCategoryTranslation $translation): static
    {
        if (!$this->translations->contains($translation)) {
            $this->translations->add($translation);
            $translation->setObject($this);
        }

        return $this;
    }
}
