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
use App\Modules\Classification\Repository\SonataClassificationContextRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Sonata\ClassificationBundle\Entity\BaseContext;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;

#[ORM\Entity(repositoryClass: SonataClassificationContextRepository::class)]
#[ORM\Table(name: 'classification__context')]
#[Gedmo\SoftDeleteable]
#[ApiResource]
class SonataClassificationContext extends BaseContext
{
    use SoftDeleteableEntity;

    #[ORM\Id]
    #[ORM\Column(type: Types::STRING)]
    /**
     * @phpstan-ignore doctrine.columnType
     */
    protected ?string $id = null;

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
            $this->updatedAt,
            $this->deletedAt,
            $this->enabled
        ] = $data;
    }

}
