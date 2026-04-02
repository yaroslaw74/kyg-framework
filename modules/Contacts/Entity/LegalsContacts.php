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

use App\Modules\Contacts\Repository\LegalsContactsRepository;
use App\Modules\Persons\Entity\Legal;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: LegalsContactsRepository::class)]
#[ORM\Table(name: 'persons__legals_contacts')]
#[Gedmo\SoftDeleteable]
class LegalsContacts
{
    use SoftDeleteableEntity, BlameableEntity, TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'contacts')]
    private ?Legal $legal = null;

    #[ORM\ManyToOne(inversedBy: 'legals')]
    private ?Contacts $name = null;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $value = null;

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
            $this->createdAt,
            $this->createdBy,
            $this->updatedAt,
            $this->updatedBy,
            $this->deletedAt,
            $this->legal,
            $this->name,
            $this->value,
        ] = $data;
    }

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

    public function getName(): ?Contacts
    {
        return $this->name;
    }

    public function setName(?Contacts $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): static
    {
        $this->value = $value;

        return $this;
    }
}
