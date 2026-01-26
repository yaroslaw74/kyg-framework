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

#[ORM\Entity(repositoryClass: SonataClassificationContextRepository::class)]
#[ORM\Table(name: 'classification__context')]
#[ApiResource]
class SonataClassificationContext extends BaseContext
{
    #[ORM\Id]
    #[ORM\Column(type: Types::STRING)]
    /** @phpstan-ignore doctrine.columnType */
    protected ?string $id = null;
}
