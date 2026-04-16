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
use App\Interfaces\CodeInterface;
use App\Modules\Config\Entity\UsersSettings;
use App\Modules\Contacts\Entity\UsersContacts;
use App\Modules\Employees\Entity\Employees;
use App\Modules\Persons\Entity\Natural;
use App\Modules\Users\Enum\StatusUsers;
use App\Modules\Users\Enumeration\UsersStatus;
use App\Modules\Users\Repository\UserRepository;
use App\Traits\CodeTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Uploadable\Mapping\Validator;
use Misd\PhoneNumberBundle\Doctrine\DBAL\Types\PhoneNumberType;
use Sonata\IntlBundle\Timezone\TimezoneAwareInterface;
use Sonata\IntlBundle\Timezone\TimezoneAwareTrait;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Yokai\EnumBundle\Validator\Constraints\Enum;
use PhpRbacBundle\Entity\UserRoleTrait;
use PhpRbacBundle\Entity\UserRoleInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'user__user')]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_USERNAME', fields: ['username'])]
#[Gedmo\SoftDeleteable]
#[Gedmo\Uploadable(pathMethod: 'path', filenameGenerator: Validator::FILENAME_GENERATOR_SHA1, allowOverwrite: true, appendNumber: true)]
#[ApiResource]
#[UniqueEntity(fields: ['username'], message: 'There is already an account with this username')]
class User implements UserInterface, PasswordAuthenticatedUserInterface, TimezoneAwareInterface, CodeInterface, UserRoleInterface
{
    use TimezoneAwareTrait;
    use SoftDeleteableEntity;
    use BlameableEntity;
    use TimestampableEntity;
    use CodeTrait;
    use UserRoleTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, nullable: true, unique: true)]
    private ?string $username = null;

    #[ORM\Column(type: Types::STRING, nullable: true, unique: true)]
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

    #[ORM\Column(type: Types::BOOLEAN, options: ['default' => false])]
    private bool $isVerified = false;

    #[ORM\Column(type: PhoneNumberType::NAME, length: 20, nullable: true)]
    private ?string $mobile = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $address = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'friendOf')]
    #[ORM\JoinTable(name: 'user__friendships')]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'friend_id', referencedColumnName: 'id')]
    private Collection $friends;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class, mappedBy: 'friends')]
    private Collection $friendOf;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist'])]
    private ?Natural $individual = null;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist'])]
    private ?Employees $employees = null;

    /**
     * @var Collection<int, UsersContacts>
     */
    #[ORM\OneToMany(targetEntity: UsersContacts::class, mappedBy: 'user', cascade: ['remove'])]
    private Collection $contacts;

    /**
     * @var Collection<int, UsersSettings>
     */
    #[ORM\OneToMany(targetEntity: UsersSettings::class, mappedBy: 'user', cascade: ['remove'])]
    private Collection $settings;

    public function __construct()
    {
        $this->friends = new ArrayCollection();
        $this->friendOf = new ArrayCollection();
        $this->contacts = new ArrayCollection();
        $this->settings = new ArrayCollection();
        $this->addCode();
    }

    public function __toString(): string
    {
        $name = '';

        if ($this->getLastName()) {
            $name .= $this->getLastName();
        }

        if ($this->getFirstName()) {
            $name .= ' ' . mb_substr($this->getFirstName(), 0, 1) . '.';
        }
        if ($this->getMiddleName()) {
            $name .= ' ' . mb_substr($this->getMiddleName(), 0, 1) . '.';
        }

        if (!$name) {
            $name = $this->getUsername();
        }

        return $name;
    }

    /**
     * Ensure the session doesn't contain actual password hashes by CRC32C-hashing them, as supported since Symfony 7.3.
     */
    public function __serialize(): array
    {
        $data = (array) $this;
        $data["\0" . self::class . "\0password"] = hash('crc32c', $this->password);

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
            $this->mobile,
            $this->createdAt,
            $this->createdBy,
            $this->updatedAt,
            $this->updatedBy,
            $this->deletedAt,
            $this->timezone,
            $this->code,
            $this->rbacRoles,
            $this->status,
            $this->isVerified,
            $this->friends,
            $this->friendOf,
            $this->individual,
            $this->employees,
            $this->contacts,
            $this->settings,
        ] = $data;
    }

    public function path(ContainerBagInterface $params): string
    {
        return $params->get('kernel.project_dir') . '/public/uploads/avatar';
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     *
     * @deprecated since Symfony 7.3, erase credentials using the "__serialize()" method instead
     */
    #[\Deprecated]
    public function eraseCredentials(): void
    {
        // @deprecated, to be removed when upgrading to Symfony 8
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): static
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
        return (string) $this->id;
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

    public function setTimezone(string $timezone): static
    {
        $this->timezone = $timezone;

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

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getFriends(): Collection
    {
        return $this->friends;
    }

    public function addFriend(self $friend): static
    {
        if (!$this->friends->contains($friend)) {
            $this->friends->add($friend);
            $friend->addFriendOf($this);
        }

        return $this;
    }

    public function removeFriend(self $friend): static
    {
        $this->friends->removeElement($friend);
        $friend->removeFriendOf($this);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getFriendOf(): Collection
    {
        return $this->friendOf;
    }

    public function addFriendOf(self $friendOf): static
    {
        if (!$this->friendOf->contains($friendOf)) {
            $this->friendOf->add($friendOf);
            $friendOf->addFriend($this);
        }

        return $this;
    }

    public function removeFriendOf(self $friendOf): static
    {
        if ($this->friendOf->removeElement($friendOf)) {
            $friendOf->removeFriend($this);
        }

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
            $this->individual->setUser(null);
        }

        // set the owning side of the relation if necessary
        if (null !== $individual && $individual->getUser() !== $this) {
            $individual->setUser($this);
        }

        $this->individual = $individual;

        return $this;
    }

    public function getEmployees(): ?Employees
    {
        return $this->employees;
    }

    public function setEmployees(?Employees $employees): static
    {
        // unset the owning side of the relation if necessary
        if (null === $employees && null !== $this->employees) {
            $this->employees->setUser(null);
        }

        // set the owning side of the relation if necessary
        if (null !== $employees && $employees->getUser() !== $this) {
            $employees->setUser($this);
        }

        $this->employees = $employees;

        return $this;
    }

    /**
     * @return Collection<int, UsersContacts>
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(UsersContacts $contact): static
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts->add($contact);
            $contact->setUser($this);
        }

        return $this;
    }

    public function removeContact(UsersContacts $contact): static
    {
        if ($this->contacts->removeElement($contact)) {
            // set the owning side to null (unless already changed)
            if ($contact->getUser() === $this) {
                $contact->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, UsersSettings>
     */
    public function getSettings(): Collection
    {
        return $this->settings;
    }

    public function addSetting(UsersSettings $setting): static
    {
        if (!$this->settings->contains($setting)) {
            $this->settings->add($setting);
            $setting->setUser($this);
        }

        return $this;
    }
}
