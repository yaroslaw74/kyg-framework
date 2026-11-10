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

use App\Modules\Users\Repository\UserInvitationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Softspring\UserBundle\Model\UserInvitation as UserInvitationModel;

#[ORM\Entity(repositoryClass: UserInvitationRepository::class)]
#[ORM\Table(name: 'users__user_invitation')]
class UserInvitation extends UserInvitationModel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: Types::INTEGER)]
    private ?int $id = null;

    #[\Override]
    public function getId(): ?int
    {
        return $this->id;
    }

    #[\Override]
    public function getUserIdentifier(): ?string
    {
        return $this->getUser()?->getUserIdentifier();
    }

    #[\Override]
    public function getEmail(): ?string
    {
        return $this->email;
    }

    #[\Override]
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }
}
