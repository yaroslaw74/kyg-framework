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

namespace App\Modules\System\Entity;

use App\Modules\System\Repository\SonataMediaGalleryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Sonata\MediaBundle\Entity\BaseGallery;

/**
 * @phpstan-ignore missingType.generics
 */
#[ORM\Entity(repositoryClass: SonataMediaGalleryRepository::class)]
#[ORM\Table(name: 'media__gallery')]
#[Gedmo\SoftDeleteable]
class SonataMediaGallery extends BaseGallery
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
        ] = $data;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
