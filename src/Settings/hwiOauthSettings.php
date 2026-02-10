<?php

/**
 * KYG Framework for Business.
 *
 * @category   Settings
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Settings;

use Jbtronics\SettingsBundle\ParameterTypes\StringType;
use Jbtronics\SettingsBundle\Settings\Settings;
use Jbtronics\SettingsBundle\Settings\SettingsParameter;
use Jbtronics\SettingsBundle\Settings\SettingsTrait;
use Jbtronics\SettingsBundle\Storage\PHPFileStorageAdapter;
use Jbtronics\SettingsBundle\ParameterTypes\BoolType;

#[Settings(name: 'hwi', dependencyInjectable: true, storageAdapter: PHPFileStorageAdapter::class, storageAdapterOptions: ['filename' => 'HwiOauthSettings.php'])]
class hwiOauthSettings
{
    use SettingsTrait;

    #[SettingsParameter(type: BoolType::class)]
    private bool $hwiOauth = false;

    #[SettingsParameter(type: BoolType::class)]
    private bool $facebook = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:FACEBOOK_ID')]
    private ?string $facebookID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:FACEBOOK_SECRET')]
    private ?string $facebookSecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $yandex = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:YANDEX_ID')]
    private ?string $yandexID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:YANDEX_SECRET')]
    private ?string $yandexSecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $google = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:GOOGLE_ID')]
    private ?string $googleID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:GOOGLE_SECRET')]
    private ?string $googleSecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $linkedin = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:LINKEDIN_ID')]
    private ?string $linkedinID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:LINKEDIN_SECRET')]
    private ?string $linkedinSecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $mailru = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:MAILRU_ID')]
    private ?string $mailruID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:MAILRU_SECRET')]
    private ?string $mailruSecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $odnoklassniki = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:ODNOKLASSNIKI_ID')]
    private ?string $odnoklassnikiID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:ODNOKLASSNIKI_SECRET')]
    private ?string $odnoklassnikiSecret = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:ODNOKLASSNIKI_APPLICATION_KEY')]
    private ?string $odnoklassnikiApplicationKey = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $xTwitter = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:TWITTER_CONSUMER_KEY')]
    private ?string $xTwitterID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:TWITTER_CONSUMER_SECRET')]
    private ?string $xTwitterSecret = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:VKONTAKTE_ID')]
    private ?string $vkontakteID = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $vkontakte = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:VKONTAKTE_SECRET')]
    private ?string $vkontakteSecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $github = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:GITHUB_ID')]
    private ?string $githubID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:GITHUB_SECRET')]
    private ?string $githubSecret = null;

    public function getHwiOauth(): bool
    {
        return $this->hwiOauth;
    }

    public function setHwiOauth(bool $hwiOauth): void
    {
        $this->hwiOauth = $hwiOauth;
    }

    public function getFacebook(): bool
    {
        return $this->facebook;
    }

    public function setFacebook(bool $facebook): void
    {
        $this->facebook = $facebook;
    }

    public function getFacebookID(): ?string
    {
        return $this->facebookID;
    }

    public function setFacebookID(string $facebookID): void
    {
        $this->facebookID = $facebookID;
    }

    public function getFacebookSecret(): ?string
    {
        return $this->facebookSecret;
    }

    public function setFacebookSecret(string $facebookSecret): void
    {
        $this->facebookSecret = $facebookSecret;
    }

    public function getYandex(): bool
    {
        return $this->yandex;
    }

    public function setYandex(bool $yandex): void
    {
        $this->yandex = $yandex;
    }

    public function getYandexID(): ?string
    {
        return $this->yandexID;
    }

    public function setYandexID(string $yandexID): void
    {
        $this->yandexID = $yandexID;
    }

    public function getYandexSecret(): ?string
    {
        return $this->yandexSecret;
    }

    public function setYandexSecret(string $yandexSecret): void
    {
        $this->yandexSecret = $yandexSecret;
    }

    public function getGoogle(): bool
    {
        return $this->google;
    }

    public function setGoogle(bool $google): void
    {
        $this->google = $google;
    }

    public function getGoogleID(): ?string
    {
        return $this->googleID;
    }

    public function setGoogleID(string $googleID): void
    {
        $this->googleID = $googleID;
    }

    public function getGoogleSecret(): ?string
    {
        return $this->googleSecret;
    }

    public function setGoogleSecret(string $googleSecret): void
    {
        $this->googleSecret = $googleSecret;
    }

    public function getLinkedin(): bool
    {
        return $this->linkedin;
    }

    public function setLinkedin(bool $linkedin): void
    {
        $this->linkedin = $linkedin;
    }


    public function getLinkedinID(): ?string
    {
        return $this->linkedinID;
    }

    public function setLinkedinID(string $linkedinID): void
    {
        $this->linkedinID = $linkedinID;
    }

    public function getLinkedinSecret(): ?string
    {
        return $this->linkedinSecret;
    }

    public function setLinkedinSecret(string $linkedinSecret): void
    {
        $this->linkedinSecret = $linkedinSecret;
    }

    public function getMailru(): bool
    {
        return $this->mailru;
    }

    public function setMailru(bool $mailru): void
    {
        $this->mailru = $mailru;
    }

    public function getMailruID(): ?string
    {
        return $this->mailruID;
    }

    public function setMailruID(string $mailruID): void
    {
        $this->mailruID = $mailruID;
    }

    public function getMailruSecret(): ?string
    {
        return $this->mailruSecret;
    }

    public function setMailruSecret(string $mailruSecret): void
    {
        $this->mailruSecret = $mailruSecret;
    }

    public function grtOdnoklassniki(): bool
    {
        return $this->odnoklassniki;
    }

    public function setOdnoklassniki(bool $odnoklassniki): void
    {
        $this->odnoklassniki = $odnoklassniki;
    }


    public function getOdnoklassnikiID(): ?string
    {
        return $this->odnoklassnikiID;
    }

    public function setOdnoklassnikiID(string $odnoklassnikiID): void
    {
        $this->odnoklassnikiID = $odnoklassnikiID;
    }

    public function getOdnoklassnikiSecret(): ?string
    {
        return $this->odnoklassnikiSecret;
    }

    public function setOdnoklassnikiSecret(string $odnoklassnikiSecret): void
    {
        $this->odnoklassnikiSecret = $odnoklassnikiSecret;
    }

    public function getOdnoklassnikiApplicationKey(): ?string
    {
        return $this->odnoklassnikiApplicationKey;
    }

    public function setOdnoklassnikiApplicationKey(string $odnoklassnikiApplicationKey): void
    {
        $this->odnoklassnikiApplicationKey = $odnoklassnikiApplicationKey;
    }

    public function getXTwitter(): bool
    {
        return $this->xTwitter;
    }

    public function setXTwitter(bool $xTwitter): void
    {
        $this->xTwitter = $xTwitter;
    }


    public function getXTwitterID(): ?string
    {
        return $this->xTwitterID;
    }

    public function setXTwitterID(string $xTwitterID): void
    {
        $this->xTwitterID = $xTwitterID;
    }

    public function getXTwitterSecret(): ?string
    {
        return $this->xTwitterSecret;
    }

    public function setXTwitterSecret(string $xTwitterSecret): void
    {
        $this->xTwitterSecret = $xTwitterSecret;
    }

    public function getVkontakte(): bool
    {
        return $this->vkontakte;
    }

    public function setVkontakte(bool $vkontakte): void
    {
        $this->vkontakte = $vkontakte;
    }

    public function getVkontakteID(): ?string
    {
        return $this->vkontakteID;
    }

    public function setVkontakteID(string $vkontakteID): void
    {
        $this->vkontakteID = $vkontakteID;
    }

    public function getVkontakteSecret(): ?string
    {
        return $this->vkontakteSecret;
    }

    public function setVkontakteSecret(string $vkontakteSecret): void
    {
        $this->vkontakteSecret = $vkontakteSecret;
    }

    public function getGithub(): bool
    {
        return $this->github;
    }

    public function setGithub(bool $github): void
    {
        $this->github = $github;
    }

    public function getGithubID(): ?string
    {
        return $this->githubID;
    }

    public function setGithubID(string $githubID): void
    {
        $this->githubID = $githubID;
    }

    public function getGithubSecret(): ?string
    {
        return $this->githubSecret;
    }

    public function setGithubSecret(string $githubSecret): void
    {
        $this->githubSecret = $githubSecret;
    }
}
