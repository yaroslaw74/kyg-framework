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

use App\Modules\Users\Repository\FriendshipsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FriendshipsRepository::class)]
#[ORM\Table(name: 'user__friendships')]
class Friendships
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::INTEGER)]
    private int $user_id;

    #[ORM\Column(type: Types::INTEGER)]
    private int $friend_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getFriendId(): int
    {
        return $this->friend_id;
    }

    public function setFriendId(int $friend_id): static
    {
        $this->friend_id = $friend_id;

        return $this;
    }
}
