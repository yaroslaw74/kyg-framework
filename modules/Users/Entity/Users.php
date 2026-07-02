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

use App\Modules\Users\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Uploadable\Mapping\Validator;
use libphonenumber\PhoneNumber;
use Sonata\IntlBundle\Timezone\TimezoneAwareInterface;
use Sonata\IntlBundle\Timezone\TimezoneAwareTrait;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[ORM\Table(name: 'users__user')]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_USERNAME', fields: ['username'])]
#[Gedmo\SoftDeleteable]
#[Gedmo\Uploadable(allowOverwrite: true, appendNumber: true, filenameGenerator: Validator::FILENAME_GENERATOR_SHA1)]
#[UniqueEntity(fields: ['username'], message: 'There is already an account with this username')]
class Users implements UserInterface, PasswordAuthenticatedUserInterface, TimezoneAwareInterface, \Stringable
{
    use BlameableEntity;
    use SoftDeleteableEntity;
    use TimestampableEntity;
    use TimezoneAwareTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(name: 'username', type: Types::STRING, length: 180, unique: true, nullable: true)]
    private ?string $username = null;

    #[ORM\Column(name: 'email', type: Types::STRING, unique: true, nullable: true)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column(name: 'roles', type: Types::JSON)]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column(name: 'password', type: Types::STRING, nullable: true)]
    private ?string $password = null;

    #[ORM\Column(name: 'first_name', type: Types::STRING, length: 100, nullable: true)]
    private ?string $firstName = null;

    #[ORM\Column(name: 'last_name', type: Types::STRING, length: 100, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(name: 'middle_name', type: Types::STRING, length: 100, nullable: true)]
    private ?string $middleName = null;

    #[ORM\Column(name: 'locale', type: Types::STRING, length: 20, nullable: true)]
    private ?string $locale = null;

    #[ORM\Column(name: 'is_verified', type: Types::BOOLEAN, options: ['default' => false])]
    private bool $isVerified = false;

    #[ORM\Column(name: 'facebook', type: Types::STRING, unique: true, nullable: true)]
    private ?string $facebook = null;

    #[ORM\Column(name: 'yandex', type: Types::STRING, unique: true, nullable: true)]
    private ?string $yandex = null;

    #[ORM\Column(name: 'google', type: Types::STRING, unique: true, nullable: true)]
    private ?string $google = null;

    #[ORM\Column(name: 'linkedin', type: Types::STRING, unique: true, nullable: true)]
    private ?string $linkedin = null;

    #[ORM\Column(name: 'mailru', type: Types::STRING, unique: true, nullable: true)]
    private ?string $mailru = null;

    #[ORM\Column(name: 'odnoklassniki', type: Types::STRING, unique: true, nullable: true)]
    private ?string $odnoklassniki = null;

    #[ORM\Column(name: 'x_twitter', type: Types::STRING, unique: true, nullable: true)]
    private ?string $xTwitter = null;

    #[ORM\Column(name: 'vkontakte', type: Types::STRING, unique: true, nullable: true)]
    private ?string $vkontakte = null;

    #[ORM\Column(name: 'github', type: Types::STRING, unique: true, nullable: true)]
    private ?string $github = null;

    #[ORM\Column(name: 'amazon', type: Types::STRING, unique: true, nullable: true)]
    private ?string $amazon = null;

    #[ORM\Column(name: 'instagram', type: Types::STRING, unique: true, nullable: true)]
    private ?string $instagram = null;

    #[ORM\Column(name: 'twitch', type: Types::STRING, unique: true, nullable: true)]
    private ?string $twitch = null;

    #[ORM\Column(name: 'yahoo', type: Types::STRING, unique: true, nullable: true)]
    private ?string $yahoo = null;

    #[ORM\Column(name: 'spotify', type: Types::STRING, unique: true, nullable: true)]
    private ?string $spotify = null;

    #[ORM\Column(name: 'trello', type: Types::STRING, unique: true, nullable: true)]
    private ?string $trello = null;

    #[ORM\Column(name: 'dropbox', type: Types::STRING, unique: true, nullable: true)]
    private ?string $dropbox = null;

    #[ORM\Column(name: 'flickr', type: Types::STRING, unique: true, nullable: true)]
    private ?string $flickr = null;

    #[ORM\Column(name: 'windows_live', type: Types::STRING, unique: true, nullable: true)]
    private ?string $windowsLive = null;

    #[ORM\Column(name: 'gravatar', type: Types::STRING, nullable: true)]
    private ?string $gravatar = null;

    #[ORM\Column(name: 'avatar', type: Types::STRING, nullable: true)]
    #[Gedmo\UploadableFileName]
    private ?string $avatar = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'friendOf')]
    #[ORM\JoinTable(name: 'users__friendships')]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'friend_id', referencedColumnName: 'id')]
    private Collection $friends;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class, mappedBy: 'friends')]
    private Collection $friendOf;

    #[ORM\Column(name: 'mobile', type: 'phone_number', nullable: true)]
    /** @phpstan-ignore doctrine.descriptorNotFound */
    private ?PhoneNumber $mobile = null;

    #[ORM\Column(name: 'address', type: Types::TEXT, nullable: true)]
    private ?string $address = null;

    #[ORM\Column(name: 'timezone', type: Types::STRING, nullable: true)]
    private ?string $timezone = null;

    public function __construct()
    {
        $this->friends = new ArrayCollection();
        $this->friendOf = new ArrayCollection();
    }

    public function __toString(): string
    {
        $name = '';

        if (null !== $this->getLastName()) {
            $name .= $this->getLastName();
        }

        if (null !== $this->getFirstName()) {
            $name .= ' '.mb_substr($this->getFirstName(), 0, 1).'.';
        }
        if (null !== $this->getMiddleName()) {
            $name .= ' '.mb_substr($this->getMiddleName(), 0, 1).'.';
        }

        if ('' !== $name) {
            $name = $this->getUsername();
        }

        return (string) $name;
    }

    /**
     * Ensure the session doesn't contain actual password hashes by CRC32C-hashing them, as supported since Symfony 7.3.
     */
    public function __serialize(): array
    {
        $data = (array) $this;
        $data["\0".self::class."\0password"] = hash('crc32c', (string) $this->password);

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
            $this->roles,
            $this->password,
            $this->firstName,
            $this->lastName,
            $this->middleName,
            $this->locale,
            $this->isVerified,
            $this->facebook,
            $this->yandex,
            $this->google,
            $this->linkedin,
            $this->mailru,
            $this->odnoklassniki,
            $this->xTwitter,
            $this->vkontakte,
            $this->github,
            $this->amazon,
            $this->instagram,
            $this->twitch,
            $this->yahoo,
            $this->spotify,
            $this->trello,
            $this->dropbox,
            $this->flickr,
            $this->windowsLive,
            $this->gravatar,
            $this->avatar,
            $this->friends,
            $this->friendOf,
            $this->mobile,
            $this->address,
            $this->timezone,
            $this->createdAt,
            $this->createdBy,
            $this->updatedAt,
            $this->updatedBy,
            $this->deletedAt,
        ] = $data;
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

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

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

    public function getYandex(): ?string
    {
        return $this->yandex;
    }

    public function setYandex(?string $yandex): static
    {
        $this->yandex = $yandex;

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

    public function getXTwitter(): ?string
    {
        return $this->xTwitter;
    }

    public function setXTwitter(?string $xTwitter): static
    {
        $this->xTwitter = $xTwitter;

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

    public function getGithub(): ?string
    {
        return $this->github;
    }

    public function setGithub(?string $github): static
    {
        $this->github = $github;

        return $this;
    }

    public function getAmazon(): ?string
    {
        return $this->amazon;
    }

    public function setAmazon(?string $amazon): static
    {
        $this->amazon = $amazon;

        return $this;
    }

    public function getInstagram(): ?string
    {
        return $this->instagram;
    }

    public function setInstagram(?string $instagram): static
    {
        $this->instagram = $instagram;

        return $this;
    }

    public function getTwitch(): ?string
    {
        return $this->twitch;
    }

    public function setTwitch(?string $twitch): static
    {
        $this->twitch = $twitch;

        return $this;
    }

    public function getYahoo(): ?string
    {
        return $this->yahoo;
    }

    public function setYahoo(?string $yahoo): static
    {
        $this->yahoo = $yahoo;

        return $this;
    }

    public function getSpotify(): ?string
    {
        return $this->spotify;
    }

    public function setSpotify(?string $spotify): static
    {
        $this->spotify = $spotify;

        return $this;
    }

    public function getTrello(): ?string
    {
        return $this->trello;
    }

    public function setTrello(?string $trello): static
    {
        $this->trello = $trello;

        return $this;
    }

    public function getDropbox(): ?string
    {
        return $this->dropbox;
    }

    public function setDropbox(?string $dropbox): static
    {
        $this->dropbox = $dropbox;

        return $this;
    }

    public function getFlickr(): ?string
    {
        return $this->flickr;
    }

    public function setFlickr(?string $flickr): static
    {
        $this->flickr = $flickr;

        return $this;
    }

    public function getWindowsLive(): ?string
    {
        return $this->windowsLive;
    }

    public function setWindowsLive(?string $windowsLive): static
    {
        $this->windowsLive = $windowsLive;

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

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): static
    {
        $this->avatar = $avatar;

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
        }

        return $this;
    }

    public function removeFriend(self $friend): static
    {
        $this->friends->removeElement($friend);

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

    public function getMobile(): ?PhoneNumber
    {
        return $this->mobile;
    }

    public function setMobile(?PhoneNumber $mobile): static
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function setTimezone(string $timezone): static
    {
        $this->timezone = $timezone;

        return $this;
    }
}
