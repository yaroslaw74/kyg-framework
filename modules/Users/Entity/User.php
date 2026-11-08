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
use App\Modules\Users\Model\OauthTrait;
use App\Modules\Users\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Uploadable\Mapping\Validator;
use libphonenumber\PhoneNumber;
use Softspring\UserBundle\Entity\ConfirmableTrait;
use Softspring\UserBundle\Entity\EmailTrait;
use Softspring\UserBundle\Entity\NameSurnameTrait;
use Softspring\UserBundle\Entity\PasswordRequestTrait;
use Softspring\UserBundle\Entity\RolesFullTrait;
use Softspring\UserBundle\Entity\UserIdentifierUsernameTrait;
use Softspring\UserBundle\Entity\UserPasswordTrait;
use Softspring\UserBundle\Model\ConfirmableInterface;
use Softspring\UserBundle\Model\NameSurnameInterface;
use Softspring\UserBundle\Model\Oauth\FacebookOauthInterface;
use Softspring\UserBundle\Model\PasswordRequestInterface;
use Softspring\UserBundle\Model\RolesFullInterface;
use Softspring\UserBundle\Model\User as UserModel;
use Softspring\UserBundle\Model\UserHasLocalePreferenceInterface;
use Softspring\UserBundle\Model\UserHasLocalePreferenceTrait;
use Softspring\UserBundle\Model\UserIdentifierUsernameInterface;
use Softspring\UserBundle\Model\UserPasswordInterface;
use Softspring\UserBundle\Model\UserWithEmailInterface;
use Sonata\IntlBundle\Timezone\TimezoneAwareInterface;
use Sonata\IntlBundle\Timezone\TimezoneAwareTrait;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ApiResource]
#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'user')]
#[ORM\HasLifecycleCallbacks]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_USERNAME', fields: ['username'])]
#[Gedmo\Uploadable(allowOverwrite: true, appendNumber: true, filenameGenerator: Validator::FILENAME_GENERATOR_SHA1)]
#[Gedmo\SoftDeleteable]
class User extends UserModel implements UserInterface, UserIdentifierUsernameInterface, UserWithEmailInterface, UserPasswordInterface, NameSurnameInterface, RolesFullInterface, TimezoneAwareInterface, UserHasLocalePreferenceInterface, FacebookOauthInterface, PasswordAuthenticatedUserInterface, ConfirmableInterface, PasswordRequestInterface
{
    use BlameableEntity;
    use ConfirmableTrait;
    use EmailTrait;
    use NameSurnameTrait;
    use OauthTrait;
    use PasswordRequestTrait;
    use RolesFullTrait;
    use SoftDeleteableEntity;
    use TimestampableEntity;
    use TimezoneAwareTrait;
    use UserHasLocalePreferenceTrait;
    use UserIdentifierUsernameTrait;
    use UserPasswordTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(name: 'time_zone', type: Types::STRING, length: 100, nullable: true)]
    private ?string $timezone = null;

    #[ORM\Column(name: 'locale', type: Types::STRING, length: 20, nullable: true, options: ['fixed' => true])]
    protected ?string $locale = null;

    #[ORM\Column(name: 'gravatar', type: Types::STRING, unique: true, nullable: true)]
    private ?string $gravatar = null;

    #[ORM\Column(name: 'phone_number', type: 'phone_number', nullable: true)]
    /** @phpstan-ignore doctrine.descriptorNotFound */
    private ?PhoneNumber $phoneNumber = null;

    #[ORM\Column(name: 'avatar', type: Types::STRING, nullable: true)]
    #[Gedmo\UploadableFileName]
    private ?string $avatar = null;

    public function getDisplayName(): string
    {
        return trim(($this->getName() ?? '').' '.($this->getSurname() ?? ''));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setTimezone(string $timezone): static
    {
        $this->timezone = $timezone;

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

    public function getPhoneNumber(): ?PhoneNumber
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?PhoneNumber $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

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
}
