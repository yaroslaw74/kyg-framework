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
use App\Modules\Config\Repository\SonataClassificationCategoryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Sonata\ClassificationBundle\Entity\BaseCategory;

#[ORM\Entity(repositoryClass: SonataClassificationCategoryRepository::class)]
#[ORM\Table(name: 'classification__category')]
#[Gedmo\SoftDeleteable]
#[ApiResource]
class SonataClassificationCategory extends BaseCategory
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
            $this->position,
            $this->children,
            $this->parent,
            $this->context,
        ] = $data;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
