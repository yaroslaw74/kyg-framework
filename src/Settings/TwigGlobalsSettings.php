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

#[Settings(name: 'twig', dependencyInjectable: true, storageAdapter: PHPFileStorageAdapter::class, storageAdapterOptions: ['filename' => 'TwigGlobalsSettings.php'])]
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getВesktopLogo(): ?string
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
}
