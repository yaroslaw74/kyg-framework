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

namespace App\Modules\Users\Entity;

use App\Modules\Users\Repository\AccountRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Softspring\AccountBundle\Entity\AccountMembershipsTrait;
use Softspring\AccountBundle\Model\Account as AccountModel;
use Softspring\AccountBundle\Model\AccountMembershipsInterface;
use Softspring\UserBundle\Entity\OwnerTrait;
use Softspring\UserBundle\Model\OwnerInterface;

#[ORM\Entity(repositoryClass: AccountRepository::class)]
#[ORM\Table(name: 'users__account')]
#[Gedmo\SoftDeleteable]
class Account extends AccountModel implements AccountMembershipsInterface, OwnerInterface
{
    use AccountMembershipsTrait;
    use BlameableEntity;
    use OwnerTrait;
    use SoftDeleteableEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: Types::INTEGER)]
    private ?int $id = null;

    public function __construct()
    {
        $this->memberships = new ArrayCollection();
    }

    #[\Override]
    public function getId(): ?int
    {
        return $this->id;
    }
}
