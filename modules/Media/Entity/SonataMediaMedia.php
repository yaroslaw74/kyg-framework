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
use App\Modules\Media\Repository\SonataMediaMediaRepository;
use Doctrine\ORM\Mapping as ORM;
use Sonata\MediaBundle\Entity\BaseMedia;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: SonataMediaMediaRepository::class)]
#[ORM\Table(name: 'media__media')]
#[ApiResource]
class SonataMediaMedia extends BaseMedia
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    protected ?Uuid $id = null;

    public function getId(): ?string
    {
        if (null === $this->id) {
            return null;
        }

        return $this->id->toString();
    }

    public function getUuid(): ?Uuid
    {
        return $this->id;
    }
}
