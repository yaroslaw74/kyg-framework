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
use App\Modules\Classification\Entity\FAQCategory\SonataClassificationContextTranslation;
use App\Modules\Classification\Repository\SonataClassificationContextRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Translatable\Translatable;
use Sonata\ClassificationBundle\Entity\BaseContext;

#[ORM\Entity(repositoryClass: SonataClassificationContextRepository::class)]
#[ORM\Table(name: 'classification__context')]
#[Gedmo\SoftDeleteable]
#[ApiResource]
class SonataClassificationContext extends BaseContext implements Translatable
{
    use SoftDeleteableEntity;
    use BlameableEntity;

    #[ORM\Id]
    #[ORM\Column(type: Types::STRING)]
    /**
     * @phpstan-ignore doctrine.columnType
     */
    protected ?string $id = null;

    /**
     * @var Collection<int, SonataClassificationContextTranslation>
     */
    #[ORM\OneToMany(targetEntity: SonataClassificationContextTranslation::class, mappedBy: 'object', cascade: ['persist', 'remove'])]
    private Collection $translations;

    public function __construct()
    {
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
            $this->createdAt,
            $this->createdBy,
            $this->updatedAt,
            $this->updatedBy,
            $this->deletedAt,
            $this->enabled,
            $this->translations,
        ] = $data;
    }

    /**
     * @return Collection<int, SonataClassificationContextTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(SonataClassificationContextTranslation $translation): static
    {
        if (!$this->translations->contains($translation)) {
            $this->translations->add($translation);
            $translation->setObject($this);
        }

        return $this;
    }
}
