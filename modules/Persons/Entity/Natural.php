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

use ApiPlatform\Metadata\ApiResource;
use App\Modules\Employees\Entity\Employees;
use App\Modules\Persons\Repository\NaturalRepository;
use App\Modules\Users\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Uploadable\Mapping\Validator;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: NaturalRepository::class)]
#[ORM\Table(name: 'persons__natural')]
#[Gedmo\SoftDeleteable]
#[Gedmo\Uploadable(pathMethod: 'path', filenameGenerator: Validator::FILENAME_GENERATOR_SHA1, allowOverwrite: true, appendNumber: true)]
#[ApiResource]
class Natural
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

    #[ORM\Column(type: Types::STRING, length: 100, nullable: true)]
    #[Gedmo\UploadableFileName]
    private ?string $photo = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: Types::STRING, length: 20, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $address = null;

    #[ORM\OneToOne(inversedBy: 'individual', cascade: ['persist'])]
    private ?Employees $employee = null;

    #[ORM\OneToOne(inversedBy: 'individual', cascade: ['persist'])]
    private ?User $user = null;

    /**
     * @var Collection<int, Officials>
     */
    #[ORM\OneToMany(targetEntity: Officials::class, mappedBy: 'individual', cascade: ['persist', 'remove'])]
    private Collection $legals;

    public function __construct()
    {
        $this->legals = new ArrayCollection();
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
            $this->photo,
            $this->email,
            $this->phone,
            $this->address,
            $this->createdAt,
            $this->createdBy,
            $this->updatedAt,
            $this->updatedBy,
            $this->deletedAt,
            $this->employee,
            $this->user,
        ] = $data;
    }

    public function path(ContainerBagInterface $params): string
    {
        return $params->get('kernel.project_dir').'/public/uploads/persons/photo';
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

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getEmployee(): ?Employees
    {
        return $this->employee;
    }

    public function setEmployee(?Employees $employee): static
    {
        $this->employee = $employee;

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

    /**
     * @return Collection<int, Officials>
     */
    public function getLegals(): Collection
    {
        return $this->legals;
    }

    public function addLegal(Officials $legal): static
    {
        if (!$this->legals->contains($legal)) {
            $this->legals->add($legal);
            $legal->setIndividual($this);
        }

        return $this;
    }

    public function removeLegal(Officials $legal): static
    {
        if ($this->legals->removeElement($legal)) {
            // set the owning side to null (unless already changed)
            if ($legal->getIndividual() === $this) {
                $legal->setIndividual(null);
            }
        }

        return $this;
    }
}
