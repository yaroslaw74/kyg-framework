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

use App\Modules\Users\Repository\OAuthUsersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OAuthUsersRepository::class)]
#[ORM\Table(name: 'user__oauth')]
class OAuthUsers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\OneToOne(mappedBy: 'oauth', cascade: ['persist', 'remove'])]
    private ?Users $user = null;

    public function __serialize(): array
    {
        return (array) $this;
    }

    /**
     * @param mixed[] $data
     */
    public function __unserialize(array $data): void
    {
        [
            $this->id,
            $this->user,
        ] = $data;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): static
    {
        // unset the owning side of the relation if necessary
        if (!$user instanceof Users && $this->user instanceof Users) {
            $this->user->setOauth(null);
        }

        // set the owning side of the relation if necessary
        if ($user instanceof Users && $user->getOauth() !== $this) {
            $user->setOauth($this);
        }

        $this->user = $user;

        return $this;
    }
}
