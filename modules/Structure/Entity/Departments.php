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
use App\Modules\Structure\Repository\DepartmentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Doctrine\DBAL\Types\Types;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: DepartmentsRepository::class)]
#[ORM\Table(name: 'structure__departments')]
#[Gedmo\SoftDeleteable]
#[ApiResource]
class Departments
{
    use SoftDeleteableEntity;
    use BlameableEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    private ?Uuid $id = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $name = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'children')]
    private ?self $parent = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'parent')]
    private Collection $children;

    #[ORM\ManyToOne(inversedBy: 'departments')]
    #[ORM\JoinColumn(nullable: false)]
    private Enterprises $enterprise;

    /**
     * @var Collection<int, Positions>
     */
    #[ORM\OneToMany(targetEntity: Positions::class, mappedBy: 'department')]
    private Collection $positions;

    public function __construct()
    {
        $this->positions = new ArrayCollection();
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
            $this->id,
            $this->name,
            $this->createdAt,
            $this->createdBy,
            $this->updatedAt,
            $this->updatedBy,
            $this->deletedAt,
            $this->children,
            $this->parent,
            $this->enterprise,
            $this->positions,
        ] = $data;
    }

    public function getId(): ?string
    {
        if (null !== $this->id) {
            return $this->id->toString();
        }

        return null;
    }

    public function getUuid(): ?Uuid
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

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): static
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(self $child): static
    {
        if (!$this->children->contains($child)) {
            $this->children->add($child);
            $child->setParent($this);
        }

        return $this;
    }

    public function removeChild(self $child): static
    {
        if ($this->children->removeElement($child)) {
            // set the owning side to null (unless already changed)
            if ($child->getParent() === $this) {
                $child->setParent(null);
            }
        }

        return $this;
    }

    public function getEnterprise(): Enterprises
    {
        return $this->enterprise;
    }

    public function setEnterprise(Enterprises $enterprise): static
    {
        $this->enterprise = $enterprise;

        return $this;
    }

    /**
     * @return Collection<int, Positions>
     */
    public function getPositions(): Collection
    {
        return $this->positions;
    }

    public function addPosition(Positions $position): static
    {
        if (!$this->positions->contains($position)) {
            $this->positions->add($position);
            $position->setDepartment($this);
        }

        return $this;
    }

    public function removePosition(Positions $position): static
    {
        if ($this->positions->removeElement($position)) {
            // set the owning side to null (unless already changed)
            if ($position->getDepartment() === $this) {
                $position->setDepartment(null);
            }
        }

        return $this;
    }
}
