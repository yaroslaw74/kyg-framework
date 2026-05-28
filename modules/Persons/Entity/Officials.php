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

namespace App\Modules\Persons\Entity;

use App\Modules\Persons\Repository\OfficialsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OfficialsRepository::class)]
#[ORM\Table(name: 'persons__officials')]
class Officials
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'officials')]
    private ?Legal $legal = null;

    #[ORM\ManyToOne(inversedBy: 'legals')]
    private ?Natural $individual = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $job = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLegal(): ?Legal
    {
        return $this->legal;
    }

    public function setLegal(?Legal $legal): static
    {
        $this->legal = $legal;

        return $this;
    }

    public function getIndividual(): ?Natural
    {
        return $this->individual;
    }

    public function setIndividual(?Natural $individual): static
    {
        $this->individual = $individual;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(string $job): static
    {
        $this->job = $job;

        return $this;
    }
}
