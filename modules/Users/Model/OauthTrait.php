<?php

/**
 * KYG Framework for Business.
 *
 * @category   Model
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Users\Model;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Softspring\UserBundle\Entity\Oauth\FacebookOauthTrait;

/**
 * @phpstan-ignore symplify.forbiddenTrait
 */
trait OauthTrait
{
    use FacebookOauthTrait;

    #[ORM\Column(name: 'yandex_user_id', type: Types::STRING, unique: true, nullable: true)]
    private ?string $yandexUserId = null;

    #[ORM\Column(name: 'google_user_id', type: Types::STRING, unique: true, nullable: true)]
    private ?string $googleUserId = null;

    #[ORM\Column(name: 'linkedin_user_id', type: Types::STRING, unique: true, nullable: true)]
    private ?string $linkedinUserId = null;

    #[ORM\Column(name: 'mail_ru_user_id', type: Types::STRING, unique: true, nullable: true)]
    private ?string $mailruUserId = null;

    #[ORM\Column(name: 'odnoklassniki_user_id', type: Types::STRING, unique: true, nullable: true)]
    private ?string $odnoklassnikiUserId = null;

    #[ORM\Column(name: 'x_twitter_user_id', type: Types::STRING, unique: true, nullable: true)]
    private ?string $xTwitterUserId = null;

    #[ORM\Column(name: 'vkontakte_user_id', type: Types::STRING, unique: true, nullable: true)]
    private ?string $vkontakteUserId = null;

    #[ORM\Column(name: 'github_user_id', type: Types::STRING, unique: true, nullable: true)]
    private ?string $githubUserId = null;

    #[ORM\Column(name: 'amazon_user_id', type: Types::STRING, unique: true, nullable: true)]
    private ?string $amazonUserId = null;

    #[ORM\Column(name: 'instagram_user_id', type: Types::STRING, unique: true, nullable: true)]
    private ?string $instagramUserId = null;

    #[ORM\Column(name: 'twitch_user_id', type: Types::STRING, unique: true, nullable: true)]
    private ?string $twitchUserId = null;

    #[ORM\Column(name: 'yahoo_user_id', type: Types::STRING, unique: true, nullable: true)]
    private ?string $yahooUserId = null;

    #[ORM\Column(name: 'spotify_user_id', type: Types::STRING, unique: true, nullable: true)]
    private ?string $spotifyUserId = null;

    #[ORM\Column(name: 'trello_user_id', type: Types::STRING, unique: true, nullable: true)]
    private ?string $trelloUserId = null;

    #[ORM\Column(name: 'dropbox_user_id', type: Types::STRING, unique: true, nullable: true)]
    private ?string $dropboxUserId = null;

    #[ORM\Column(name: 'flickr_user_id', type: Types::STRING, unique: true, nullable: true)]
    private ?string $flickrUserId = null;

    #[ORM\Column(name: 'windows_live_user_id', type: Types::STRING, unique: true, nullable: true)]
    private ?string $windowsLiveUserId = null;

    public function getYandexUserId(): ?string
    {
        return $this->yandexUserId;
    }

    public function setYandexUserId(?string $yandexUserId): static
    {
        $this->yandexUserId = $yandexUserId;

        return $this;
    }

    public function getGoogleUserId(): ?string
    {
        return $this->googleUserId;
    }

    public function setGoogleUserId(?string $googleUserId): static
    {
        $this->googleUserId = $googleUserId;

        return $this;
    }

    public function getLinkedinUserId(): ?string
    {
        return $this->linkedinUserId;
    }

    public function setLinkedinUserId(?string $linkedinUserId): static
    {
        $this->linkedinUserId = $linkedinUserId;

        return $this;
    }

    public function getMailruUserId(): ?string
    {
        return $this->mailruUserId;
    }

    public function setMailru(?string $mailruUserId): static
    {
        $this->mailruUserId = $mailruUserId;

        return $this;
    }

    public function getOdnoklassnikiUserId(): ?string
    {
        return $this->odnoklassnikiUserId;
    }

    public function setOdnoklassnikiUserId(?string $odnoklassnikiUserId): static
    {
        $this->odnoklassnikiUserId = $odnoklassnikiUserId;

        return $this;
    }

    public function getXTwitterUserId(): ?string
    {
        return $this->xTwitterUserId;
    }

    public function setXTwitterUserId(?string $xTwitterUserId): static
    {
        $this->xTwitterUserId = $xTwitterUserId;

        return $this;
    }

    public function getVkontakteUserId(): ?string
    {
        return $this->vkontakteUserId;
    }

    public function setVkontakteUserId(?string $vkontakteUserId): static
    {
        $this->vkontakteUserId = $vkontakteUserId;

        return $this;
    }

    public function getGithubUserId(): ?string
    {
        return $this->githubUserId;
    }

    public function setGithubUserId(?string $githubUserId): static
    {
        $this->githubUserId = $githubUserId;

        return $this;
    }

    public function getAmazonUserId(): ?string
    {
        return $this->amazonUserId;
    }

    public function setAmazonUserId(?string $amazonUserId): static
    {
        $this->amazonUserId = $amazonUserId;

        return $this;
    }

    public function getInstagramUserId(): ?string
    {
        return $this->instagramUserId;
    }

    public function setInstagramUserId(?string $instagramUserId): static
    {
        $this->instagramUserId = $instagramUserId;

        return $this;
    }

    public function getTwitchUserId(): ?string
    {
        return $this->twitchUserId;
    }

    public function setTwitchUserId(?string $twitchUserId): static
    {
        $this->twitchUserId = $twitchUserId;

        return $this;
    }

    public function getYahooUserId(): ?string
    {
        return $this->yahooUserId;
    }

    public function setYahoo(?string $yahooUserId): static
    {
        $this->yahooUserId = $yahooUserId;

        return $this;
    }

    public function getSpotifyUserId(): ?string
    {
        return $this->spotifyUserId;
    }

    public function setSpotifyUserId(?string $spotifyUserId): static
    {
        $this->spotifyUserId = $spotifyUserId;

        return $this;
    }

    public function getTrelloUserId(): ?string
    {
        return $this->trelloUserId;
    }

    public function setTrelloUserId(?string $trelloUserId): static
    {
        $this->trelloUserId = $trelloUserId;

        return $this;
    }

    public function getDropboxUserId(): ?string
    {
        return $this->dropboxUserId;
    }

    public function setDropboxUserId(?string $dropboxUserId): static
    {
        $this->dropboxUserId = $dropboxUserId;

        return $this;
    }

    public function getFlickrUserId(): ?string
    {
        return $this->flickrUserId;
    }

    public function setFlickrUserId(?string $flickrUserId): static
    {
        $this->flickrUserId = $flickrUserId;

        return $this;
    }

    public function getWindowsLiveUserId(): ?string
    {
        return $this->windowsLiveUserId;
    }

    public function setWindowsLiveUserId(?string $windowsLiveUserId): static
    {
        $this->windowsLiveUserId = $windowsLiveUserId;

        return $this;
    }
}
