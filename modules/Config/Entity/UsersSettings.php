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

namespace App\Modules\Config\Entity;

use App\Modules\Config\Repository\UsersSettingsRepository;
use App\Modules\Users\Entity\User;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersSettingsRepository::class)]
#[ORM\Table(name: 'config__settings')]
class UsersSettings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, nullable: false)]
    protected string $key;

    /**
     * @var mixed[] $data
     */
    #[ORM\Column(type: Types::JSON, nullable: true)]
    protected ?array $data = null;

    #[ORM\ManyToOne(inversedBy: 'settings')]
    private ?User $user = null;

    public function __construct(string $key)
    {
        $this->setKey($key);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): static
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @return mixed[]|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param mixed[]|null $data
     */
    public function setData(?array $data): static
    {
        $this->data = $data;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
