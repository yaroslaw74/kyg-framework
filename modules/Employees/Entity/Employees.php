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

namespace App\Modules\Employees\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Modules\Employees\Repository\EmployeesRepository;
use App\Modules\Persons\Entity\Natural;
use App\Modules\Users\Entity\User;
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

#[ORM\Entity(repositoryClass: EmployeesRepository::class)]
#[ORM\Table(name: 'employees__employees')]
#[Gedmo\Uploadable(pathMethod: 'path', filenameGenerator: Validator::FILENAME_GENERATOR_SHA1, allowOverwrite: true, appendNumber: true)]
#[Gedmo\SoftDeleteable]
#[ApiResource]
class Employees
{
    use SoftDeleteableEntity;
    use BlameableEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    private ?Uuid $id = null;

    #[ORM\Column(type: Types::STRING, length: 100, nullable: true)]
    private ?string $firstName = null;

    #[ORM\Column(type: Types::STRING, length: 100, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(type: Types::STRING, length: 100, nullable: true)]
    private ?string $middleName = null;

    #[ORM\Column(type: Types::STRING, length: 100, nullable: true)]
    #[Gedmo\UploadableFileName]
    private ?string $photo = null;

    #[ORM\Column(type: Types::STRING, nullable: true, unique: true)]
    private ?string $email = null;

    #[ORM\Column(type: Types::STRING, length: 20, nullable: true)]
    private ?string $mobile = null;

    #[ORM\OneToOne(mappedBy: 'employee', cascade: ['persist'])]
    private ?Natural $individual = null;

    #[ORM\OneToOne(inversedBy: 'employees', cascade: ['persist'])]
    private ?User $user = null;

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
            $this->firstName,
            $this->lastName,
            $this->middleName,
            $this->photo,
            $this->email,
            $this->mobile,
            $this->createdAt,
            $this->createdBy,
            $this->updatedAt,
            $this->updatedBy,
            $this->deletedAt,
            $this->individual,
            $this->user,
        ] = $data;
    }

    public function path(ContainerBagInterface $params): string
    {
        return $params->get('kernel.project_dir').'/public/uploads/photo';
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

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $first_name): static
    {
        $this->firstName = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $last_name): static
    {
        $this->lastName = $last_name;

        return $this;
    }

    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    public function setMiddleName(?string $middle_name): static
    {
        $this->middleName = $middle_name;

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

    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    public function setMobile(?string $mobile): static
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function getIndividual(): ?Natural
    {
        return $this->individual;
    }

    public function setIndividual(?Natural $individual): static
    {
        // unset the owning side of the relation if necessary
        if (null === $individual && null !== $this->individual) {
            $this->individual->setEmployee(null);
        }

        // set the owning side of the relation if necessary
        if (null !== $individual && $individual->getEmployee() !== $this) {
            $individual->setEmployee($this);
        }

        $this->individual = $individual;

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
