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

namespace App\Modules\Config\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Modules\Config\Repository\SonataClassificationCollectionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Sonata\ClassificationBundle\Entity\BaseCollection;

#[ORM\Entity(repositoryClass: SonataClassificationCollectionRepository::class)]
#[ORM\Table(name: 'classification__collection')]
#[Gedmo\SoftDeleteable]
#[ApiResource]
class SonataClassificationCollection extends BaseCollection
{
    use SoftDeleteableEntity;
    use BlameableEntity;

    #[ORM\Id]
    #[ORM\Column(type: Types::INTEGER)]
    #[ORM\GeneratedValue]
    protected ?int $id = null;

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
            $this->context,
        ] = $data;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
