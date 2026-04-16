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

namespace App\Modules\Roles\Entity;

use Doctrine\ORM\Mapping as ORM;
use PhpRbacBundle\Entity\Permission as EntityPermission;
use PhpRbacBundle\Repository\PermissionRepository;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: PermissionRepository::class)]
#[ORM\Table('roles__permissions')]
#[Gedmo\SoftDeleteable]
class Permission extends EntityPermission
{
    use SoftDeleteableEntity;
    use BlameableEntity;
    use TimestampableEntity;
}
