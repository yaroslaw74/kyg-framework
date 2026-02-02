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

#[Settings(dependencyInjectable: true, storageAdapter: PHPFileStorageAdapter::class, storageAdapterOptions: ['filename' => 'HwiOauthSettings.php'])]
class hwiOauthSettings
{
    use SettingsTrait;

    #[SettingsParameter(type: StringType::class)]
    private ?string $facebookID = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $facebookSecret = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $yandexID = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $yandexSecret = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $googleID = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $googleSecret = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $linkedinID = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $linkedinSecret = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $mailruID = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $mailruSecret = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $odnoklassnikiID = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $odnoklassnikiSecret = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $odnoklassnikiApplicationKey = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $xTwitterID = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $xTwitterSecret = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $vkontakteID = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $vkontakteSecret = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $githubID = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $githubSecret = null;

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
