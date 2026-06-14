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

use App\Modules\Users\Repository\OAuthUsersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OAuthUsersRepository::class)]
#[ORM\Table(name: 'user__oauth')]
class OAuthUsers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\OneToOne(mappedBy: 'oauth', cascade: ['persist', 'remove'])]
    private ?Users $user = null;

    #[ORM\Column(type: Types::STRING, unique: true, nullable: true)]
    private ?string $facebook = null;

    #[ORM\Column(type: Types::STRING, unique: true, nullable: true)]
    private ?string $yandex = null;

    #[ORM\Column(type: Types::STRING, unique: true, nullable: true)]
    private ?string $google = null;

    #[ORM\Column(type: Types::STRING, unique: true, nullable: true)]
    private ?string $linkedin = null;

    #[ORM\Column(type: Types::STRING, unique: true, nullable: true)]
    private ?string $mailru = null;

    #[ORM\Column(type: Types::STRING, unique: true, nullable: true)]
    private ?string $odnoklassniki = null;

    #[ORM\Column(type: Types::STRING, unique: true, nullable: true)]
    private ?string $xTwitter = null;

    #[ORM\Column(type: Types::STRING, unique: true, nullable: true)]
    private ?string $vkontakte = null;

    #[ORM\Column(type: Types::STRING, unique: true, nullable: true)]
    private ?string $github = null;

    #[ORM\Column(type: Types::STRING, unique: true, nullable: true)]
    private ?string $amazon = null;

    #[ORM\Column(type: Types::STRING, unique: true, nullable: true)]
    private ?string $instagram = null;

    #[ORM\Column(type: Types::STRING, unique: true, nullable: true)]
    private ?string $twitch = null;

    #[ORM\Column(type: Types::STRING, unique: true, nullable: true)]
    private ?string $yahoo = null;

    #[ORM\Column(type: Types::STRING, unique: true, nullable: true)]
    private ?string $spotify = null;

    #[ORM\Column(type: Types::STRING, unique: true, nullable: true)]
    private ?string $trello = null;

    #[ORM\Column(type: Types::STRING, unique: true, nullable: true)]
    private ?string $dropbox = null;

    #[ORM\Column(type: Types::STRING, unique: true, nullable: true)]
    private ?string $flickr = null;

    #[ORM\Column(type: Types::STRING, unique: true, nullable: true)]
    private ?string $windowsLive = null;

    public function __serialize(): array
    {
        return (array) $this;
    }

    /**
     * @param mixed[] $data
     */
    public function __unserialize(array $data): void
    {
        [
            $this->id,
            $this->user,
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
        ] = $data;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): static
    {
        // unset the owning side of the relation if necessary
        if (!$user instanceof Users && $this->user instanceof Users) {
            $this->user->setOauth(null);
        }

        // set the owning side of the relation if necessary
        if ($user instanceof Users && $user->getOauth() !== $this) {
            $user->setOauth($this);
        }

        $this->user = $user;

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
}
