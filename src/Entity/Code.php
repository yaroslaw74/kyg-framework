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

namespace App\Entity;

use App\Interfaces\CodeInterface;
use App\Repository\CodeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: CodeRepository::class)]
#[ORM\Table(name: 'settings__codes')]
class Code
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    private ?Uuid $id = null;

    #[ORM\Column(type: Types::STRING, nullable: true, unique: true)]
    private ?string $target = null;

    #[ORM\OneToOne(mappedBy: 'code', cascade: ['remove'])]
    private ?CodeInterface $element = null;

    public function __toString(): string
    {
        return $this->id->toString();
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getTarget(): ?string
    {
        return $this->target;
    }

    public function setTarget(?string $target): static
    {
        $this->target = $target;

        return $this;
    }

    public function getElement(): ?CodeInterface
    {
        return $this->element;
    }

    public function setElement(CodeInterface $element): static
    {
        $this->element = $element;

        return $this;
    }
}
