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

namespace App\Modules\Users\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Modules\Users\Enum\StatusUsers;
use App\Modules\Users\Enumeration\UsersStatus;
use App\Modules\Users\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Uploadable\Mapping\Validator;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Uid\Uuid;
use Yokai\EnumBundle\Validator\Constraints\Enum;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'user__user')]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_USERNAME', fields: ['username'])]
#[UniqueEntity(fields: ['username'], message: 'There is already an account with this username')]
#[ApiResource]
#[Gedmo\SoftDeleteable]
#[Gedmo\Uploadable(pathMethod: 'path', filenameGenerator: Validator::FILENAME_GENERATOR_SHA1, allowOverwrite: true, appendNumber: true)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    use SoftDeleteableEntity;
    use BlameableEntity;

    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    private ?Uuid $id = null;

    #[ORM\Column(type: Types::STRING, length: 180, nullable: true)]
    private ?string $username = null;

    #[ORM\Column(type: Types::STRING, length: 180, unique: true, nullable: true)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column(type: Types::JSON)]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column(type: Types::STRING, nullable: true)]
    private ?string $password = null;

    #[ORM\Column(type: Types::STRING, length: 100, nullable: true)]
    private ?string $firstName = null;

    #[ORM\Column(type: Types::STRING, length: 100, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(type: Types::STRING, length: 100, nullable: true)]
    private ?string $middleName = null;

    #[ORM\Column(type: Types::STRING, length: 20, nullable: true)]
    private ?string $locale = null;

    #[ORM\Column(type: Types::STRING, length: 100, nullable: true)]
    #[Gedmo\UploadableFileName]
    private ?string $avatar = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $gravatar = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $facebook = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $google = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $yandex = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $linkedin = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $mailru = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $odnoklassniki = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $vkontakte = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $xTwitter = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $github = null;

    #[ORM\Column(nullable: false, options: ['default' => UsersStatus::STATUS_NEW])]
    #[Enum(enum: StatusUsers::class)]
    private UsersStatus $status = UsersStatus::STATUS_NEW;

    #[ORM\Column(type: Types::STRING, length: 20, nullable: true)]
    private ?string $timezone = null;

    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    private bool $isVerified = false;

    /**
     * Ensure the session doesn't contain actual password hashes by CRC32C-hashing them, as supported since Symfony 7.3.
     */
    public function __serialize(): array
    {
        $data = (array) $this;
        $data["\0".self::class."\0password"] = hash('crc32c', $this->password);

        return $data;
    }

    /**
     * @param mixed[] $data
     */
    public function __unserialize(array $data): void
    {
        [
            $this->id,
            $this->username,
            $this->email,
            $this->password,
            $this->firstName,
            $this->lastName,
            $this->middleName,
            $this->locale,
            $this->avatar,
            $this->gravatar,
            $this->roles,
            $this->facebook,
            $this->google,
            $this->yandex,
            $this->linkedin,
            $this->mailru,
            $this->odnoklassniki,
            $this->xTwitter,
            $this->vkontakte,
            $this->github,
            $this->createdBy,
            $this->updatedBy,
            $this->deletedAt,
            $this->timezone,
            $this->status,
            $this->isVerified,
        ] = $data;
    }

    #[\Deprecated]
    public function eraseCredentials(): void
    {
        // @deprecated, to be removed when upgrading to Symfony 8
    }

    public function path(ContainerBagInterface $params): string
    {
        return $params->get('kernel.project_dir').'/public/uploads/avatar';
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
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

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(?string $locale): static
    {
        $this->locale = $locale;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): static
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getGravatar(): ?string
    {
        return $this->gravatar;
    }

    public function setGravatar(?string $gravatar): static
    {
        $this->gravatar = $gravatar;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): static
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getGoogle(): ?string
    {
        return $this->google;
    }

    public function setGoogle(?string $google): static
    {
        $this->google = $google;

        return $this;
    }

    public function getYandex(): ?string
    {
        return $this->yandex;
    }

    public function setYandex(?string $yandex): static
    {
        $this->yandex = $yandex;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): static
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getMailru(): ?string
    {
        return $this->mailru;
    }

    public function setMailru(?string $mailru): static
    {
        $this->mailru = $mailru;

        return $this;
    }

    public function getOdnoklassniki(): ?string
    {
        return $this->odnoklassniki;
    }

    public function setOdnoklassniki(?string $odnoklassniki): static
    {
        $this->odnoklassniki = $odnoklassniki;

        return $this;
    }

    public function getVkontakte(): ?string
    {
        return $this->vkontakte;
    }

    public function setVkontakte(?string $vkontakte): static
    {
        $this->vkontakte = $vkontakte;

        return $this;
    }

    public function getXTwitter(): ?string
    {
        return $this->xTwitter;
    }

    public function setXTwitter(?string $xTwitter): static
    {
        $this->xTwitter = $xTwitter;

        return $this;
    }

    public function getGithub(): ?string
    {
        return $this->github;
    }

    public function setGithub(?string $github): static
    {
        $this->github = $github;

        return $this;
    }

    public function getStatus(): UsersStatus
    {
        return $this->status;
    }

    public function setStatus(UsersStatus $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(string $timezone): static
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }
}
