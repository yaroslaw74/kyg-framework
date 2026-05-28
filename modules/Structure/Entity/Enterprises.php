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

namespace App\Modules\Structure\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Modules\Structure\Repository\EnterprisesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: EnterprisesRepository::class)]
#[ORM\Table(name: 'structure__enterprises')]
#[Gedmo\SoftDeleteable]
#[ApiResource]
class Enterprises
{
    use BlameableEntity;
    use SoftDeleteableEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $name = null;

    /**
     * @var Collection<int, Departments>
     */
    #[ORM\OneToMany(targetEntity: Departments::class, mappedBy: 'enterprise', orphanRemoval: true)]
    private Collection $departments;

    public function __construct()
    {
        $this->departments = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getName();
    }

    public function __serialize(): array
    {
        $data = (array) $this;

        return $data;
    }

    /**
     * @param mixed[] $data
     */
    public function __unserialize(array $data): void
    {
        [
            $this->createdAt,
            $this->createdBy,
            $this->updatedAt,
            $this->updatedBy,
            $this->deletedAt,
            $this->id,
            $this->name,
            $this->departments,
        ] = $data;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Departments>
     */
    public function getDepartments(): Collection
    {
        return $this->departments;
    }

    public function addDepartment(Departments $department): static
    {
        if (!$this->departments->contains($department)) {
            $this->departments->add($department);
            $department->setEnterprise($this);
        }

        return $this;
    }
}
