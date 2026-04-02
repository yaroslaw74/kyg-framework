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

namespace App\Modules\Contacts\Entity;

use App\Modules\Contacts\Repository\ContactsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: ContactsRepository::class)]
#[ORM\Table(name: 'setings__contacts')]
#[Gedmo\SoftDeleteable]
class Contacts
{
    use SoftDeleteableEntity, BlameableEntity, TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, nullable: true, unique: true)]
    private ?string $name = null;

    /**
     * @var Collection<int, UsersContacts>
     */
    #[ORM\OneToMany(targetEntity: UsersContacts::class, mappedBy: 'name', cascade: ['remove'])]
    private Collection $users;

    /**
     * @var Collection<int, EmployeesContacts>
     */
    #[ORM\OneToMany(targetEntity: EmployeesContacts::class, mappedBy: 'name', cascade: ['remove'])]
    private Collection $employees;

    /**
     * @var Collection<int, LegalsContacts>
     */
    #[ORM\OneToMany(targetEntity: LegalsContacts::class, mappedBy: 'name', cascade: ['remove'])]
    private Collection $legals;

    /**
     * @var Collection<int, NaturalsContacts>
     */
    #[ORM\OneToMany(targetEntity: NaturalsContacts::class, mappedBy: 'name', cascade: ['remove'])]
    private Collection $naturals;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->employees = new ArrayCollection();
        $this->legals = new ArrayCollection();
        $this->naturals = new ArrayCollection();
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
            $this->users,
            $this->employees,
            $this->legals,
            $this->naturals,
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

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, UsersContacts>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(UsersContacts $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setName($this);
        }

        return $this;
    }

    public function removeUser(UsersContacts $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getName() === $this) {
                $user->setName(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EmployeesContacts>
     */
    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    public function addEmployee(EmployeesContacts $employee): static
    {
        if (!$this->employees->contains($employee)) {
            $this->employees->add($employee);
            $employee->setName($this);
        }

        return $this;
    }

    public function removeEmployee(EmployeesContacts $employee): static
    {
        if ($this->employees->removeElement($employee)) {
            // set the owning side to null (unless already changed)
            if ($employee->getName() === $this) {
                $employee->setName(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LegalsContacts>
     */
    public function getLegals(): Collection
    {
        return $this->legals;
    }

    public function addLegal(LegalsContacts $legal): static
    {
        if (!$this->legals->contains($legal)) {
            $this->legals->add($legal);
            $legal->setName($this);
        }

        return $this;
    }

    public function removeLegal(LegalsContacts $legal): static
    {
        if ($this->legals->removeElement($legal)) {
            // set the owning side to null (unless already changed)
            if ($legal->getName() === $this) {
                $legal->setName(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, NaturalsContacts>
     */
    public function getNaturals(): Collection
    {
        return $this->naturals;
    }

    public function addNatural(NaturalsContacts $natural): static
    {
        if (!$this->naturals->contains($natural)) {
            $this->naturals->add($natural);
            $natural->setName($this);
        }

        return $this;
    }

    public function removeNatural(NaturalsContacts $natural): static
    {
        if ($this->naturals->removeElement($natural)) {
            // set the owning side to null (unless already changed)
            if ($natural->getName() === $this) {
                $natural->setName(null);
            }
        }

        return $this;
    }
}
