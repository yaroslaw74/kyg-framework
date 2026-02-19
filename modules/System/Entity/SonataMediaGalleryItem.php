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

use App\Modules\System\Repository\SonataMediaGalleryItemRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Sonata\MediaBundle\Entity\BaseGalleryItem;

#[ORM\Entity(repositoryClass: SonataMediaGalleryItemRepository::class)]
#[ORM\Table(name: 'media__gallery_item')]
#[Gedmo\SoftDeleteable]
class SonataMediaGalleryItem extends BaseGalleryItem
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
            $this->media,
            $this->gallery,
            $this->position,
            $this->updatedAt,
            $this->updatedBy,
            $this->createdAt,
            $this->createdBy,
            $this->deletedAt,
            $this->enabled,
        ] = $data;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
