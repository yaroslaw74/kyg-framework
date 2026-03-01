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
namespace App\Modules\Nomenclature\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Modules\Classification\Entity\ClassificationCategory;
use App\Modules\Classification\Entity\ClassificationCollection;
use App\Modules\Classification\Entity\ClassificationTag;
use App\Modules\Nomenclature\Repository\NomenclatureRepository;
use App\Modules\System\Entity\Files;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity(repositoryClass: NomenclatureRepository::class)]
#[ORM\Table(name: 'nomenclature__nomenclature')]
#[Gedmo\SoftDeleteable]
#[ApiResource]
class Nomenclature
{
    use SoftDeleteableEntity;
    use BlameableEntity;

    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    private ?Uuid $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    protected ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    protected ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    /**
     * @var Collection<int, Files>
     */
    #[ORM\OneToMany(targetEntity: Files::class, nullable: true)]
    private ?Collection $images = null;

    #[ORM\ManyToOne(nullable: true)]
    private ?ClassificationCategory $category = null;

    #[ORM\ManyToOne(nullable: true)]
    private ?ClassificationCollection $collection = null;

    /**
     * @var Collection<int, ClassificationTag>
     */
    #[ORM\ManyToMany(targetEntity: ClassificationTag::class, nullable: true)]
    private Collection $tag;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->tag = new ArrayCollection();
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
            $this->images,
            $this->category,
            $this->collection,
            $this->tag,
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

    public function prePersist(): void
    {
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
    }

    public function preUpdate(): void
    {
        $this->setUpdatedAt(new \DateTime());
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt = null): void
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt = null): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Files>
     */
    public function getImages(): ?Collection
    {
        return $this->images;
    }

    public function addImage(Files $image): static
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
        }

        return $this;
    }

    public function removeImage(Files $image): static
    {
        $this->images->removeElement($image);

        return $this;
    }

    public function getCategory(): ?ClassificationCategory
    {
        return $this->category;
    }

    public function setCategory(?ClassificationCategory $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getCollection(): ?ClassificationCollection
    {
        return $this->collection;
    }

    public function setCollection(?ClassificationCollection $collection): static
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * @return Collection<int, ClassificationTag>
     */
    public function getTag(): Collection
    {
        return $this->tag;
    }

    public function addTag(ClassificationTag $tag): static
    {
        if (!$this->tag->contains($tag)) {
            $this->tag->add($tag);
        }

        return $this;
    }

    public function removeTag(ClassificationTag $tag): static
    {
        $this->tag->removeElement($tag);

        return $this;
    }
}
