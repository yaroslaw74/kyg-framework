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
use App\Modules\Contacts\Entity\LegalsContacts;
use App\Modules\Persons\Repository\LegalRepository;
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

#[ORM\Entity(repositoryClass: LegalRepository::class)]
#[ORM\Table(name: 'persons__legal')]
#[Gedmo\SoftDeleteable]
#[Gedmo\Uploadable(pathMethod: 'path', filenameGenerator: Validator::FILENAME_GENERATOR_SHA1, allowOverwrite: true, appendNumber: true)]
#[ApiResource]
class Legal
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
    private ?string $logo = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(type: Types::STRING, length: 20, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $address = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'children')]
    private ?self $parent = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'parent')]
    private Collection $children;

    /**
     * @var Collection<int, Officials>
     */
    #[ORM\OneToMany(targetEntity: Officials::class, mappedBy: 'legal', cascade: ['persist', 'remove'])]
    private Collection $officials;

    /**
     * @var Collection<int, LegalsContacts>
     */
    #[ORM\OneToMany(targetEntity: LegalsContacts::class, mappedBy: 'legal', cascade: ['remove'])]
    private Collection $contacts;

    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->officials = new ArrayCollection();
        $this->contacts = new ArrayCollection();
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
            $this->logo,
            $this->email,
            $this->phone,
            $this->address,
            $this->createdAt,
            $this->createdBy,
            $this->updatedAt,
            $this->updatedBy,
            $this->deletedAt,
            $this->parent,
            $this->children,
            $this->officials,
            $this->contacts,
        ] = $data;
    }

    public function path(ContainerBagInterface $params): string
    {
        return $params->get('kernel.project_dir').'/public/uploads/persons/logo';
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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): static
    {
        $this->logo = $logo;

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

    /**
     * @return Collection<int, Officials>
     */
    public function getOfficials(): Collection
    {
        return $this->officials;
    }

    public function addOfficial(Officials $official): static
    {
        if (!$this->officials->contains($official)) {
            $this->officials->add($official);
            $official->setLegal($this);
        }

        return $this;
    }

    public function removeOfficial(Officials $official): static
    {
        if ($this->officials->removeElement($official)) {
            // set the owning side to null (unless already changed)
            if ($official->getLegal() === $this) {
                $official->setLegal(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LegalsContacts>
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(LegalsContacts $contact): static
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts->add($contact);
            $contact->setLegal($this);
        }

        return $this;
    }

    public function removeContact(LegalsContacts $contact): static
    {
        if ($this->contacts->removeElement($contact)) {
            // set the owning side to null (unless already changed)
            if ($contact->getLegal() === $this) {
                $contact->setLegal(null);
            }
        }

        return $this;
    }
}
