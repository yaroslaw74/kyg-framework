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

use Jbtronics\SettingsBundle\ParameterTypes\BoolType;
use Jbtronics\SettingsBundle\ParameterTypes\StringType;
use Jbtronics\SettingsBundle\Settings\Settings;
use Jbtronics\SettingsBundle\Settings\SettingsParameter;
use Jbtronics\SettingsBundle\Settings\SettingsTrait;
use Jbtronics\SettingsBundle\Storage\PHPFileStorageAdapter;

#[Settings(dependencyInjectable: true, storageAdapter: PHPFileStorageAdapter::class, storageAdapterOptions: ['filename' => 'TwigGlobalsSettings.php'])]
class TwigGlobalsSettings
{
    use SettingsTrait;

    #[SettingsParameter(type: StringType::class)]
    private ?string $name = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $desktopLogo = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $toggleLogo = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $desktopWhite = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $toggleWhite = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $facebook = false;

    #[SettingsParameter(type: BoolType::class)]
    private bool $google = false;

    #[SettingsParameter(type: BoolType::class)]
    private bool $github = false;

    #[SettingsParameter(type: BoolType::class)]
    private bool $vkontakte = false;

    #[SettingsParameter(type: BoolType::class)]
    private bool $odnoklassniki = false;

    #[SettingsParameter(type: BoolType::class)]
    private bool $yandex = false;

    #[SettingsParameter(type: BoolType::class)]
    private bool $linkedin = false;

    #[SettingsParameter(type: BoolType::class)]
    private bool $xTwitter = false;

    #[SettingsParameter(type: BoolType::class)]
    private bool $mailru = false;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDesktopLogo(): ?string
    {
        return $this->desktopLogo;
    }

    public function setDesktopLogo(string $desktopLogo): void
    {
        $this->desktopLogo = $desktopLogo;
    }

    public function getToggleLogo(): ?string
    {
        return $this->toggleLogo;
    }

    public function setToggleLogo(string $toggleLogo): void
    {
        $this->toggleLogo = $toggleLogo;
    }

    public function getDesktopWhite(): ?string
    {
        return $this->desktopWhite;
    }

    public function setDesktopWhite(string $desktopWhite): void
    {
        $this->desktopWhite = $desktopWhite;
    }

    public function getToggleWhite(): ?string
    {
        return $this->toggleWhite;
    }

    public function setToggleWhite(string $toggleWhite): void
    {
        $this->toggleWhite = $toggleWhite;
    }

    public function getFacebook(): bool
    {
        return $this->facebook;
    }

    public function setFacebook(bool $facebook): void
    {
        $this->facebook = $facebook;
    }

    public function getGoogle(): bool
    {
        return $this->google;
    }

    public function setGoogle(bool $google): void
    {
        $this->google = $google;
    }

    public function getGithub(): bool
    {
        return $this->github;
    }

    public function setGithub(bool $github): void
    {
        $this->github = $github;
    }

    public function getVkontakte(): bool
    {
        return $this->vkontakte;
    }

    public function setVkontakte(bool $vkontakte): void
    {
        $this->vkontakte = $vkontakte;
    }

    public function grtOdnoklassniki(): bool
    {
        return $this->odnoklassniki;
    }

    public function setOdnoklassniki(bool $odnoklassniki): void
    {
        $this->odnoklassniki = $odnoklassniki;
    }

    public function getYandex(): bool
    {
        return $this->yandex;
    }

    public function setYandex(bool $yandex): void
    {
        $this->yandex = $yandex;
    }

    public function getLinkedin(): bool
    {
        return $this->linkedin;
    }

    public function setLinkedin(bool $linkedin): void
    {
        $this->linkedin = $linkedin;
    }

    public function getXTwitter(): bool
    {
        return $this->xTwitter;
    }

    public function setXTwitter(bool $xTwitter): void
    {
        $this->xTwitter = $xTwitter;
    }

    public function getMailru(): bool
    {
        return $this->mailru;
    }

    public function setMailru(bool $mailru): void
    {
        $this->mailru = $mailru;
    }
}
