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
use Jbtronics\SettingsBundle\Settings\ResettableSettingsInterface;
use Jbtronics\SettingsBundle\Settings\Settings;
use Jbtronics\SettingsBundle\Settings\SettingsParameter;
// use Jbtronics\SettingsBundle\ParameterTypes\IntType;
// use Symfony\Component\Validator\Constraints as Assert;
use Jbtronics\SettingsBundle\Settings\SettingsTrait;
use Jbtronics\SettingsBundle\Storage\PHPFileStorageAdapter;

#[Settings(name: 'twig', dependencyInjectable: true, storageAdapter: PHPFileStorageAdapter::class, storageAdapterOptions: ['filename' => 'twig_settings.php'])]
class TwigSettings implements ResettableSettingsInterface
{
    use SettingsTrait;

    #[SettingsParameter(type: StringType::class)]
    private ?string $AppName = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $DesktopLogo = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $ToggleLogo = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $DesktopWhiteLogo = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $ToggleWhiteLogo = null;

    public function resetToDefaultValues(): void
    {
        // Reset all properties without default values:
        $this->AppName = null;
    }

    public function getAppName(): ?string
    {
        return $this->AppName;
    }

    public function setAppName(?string $appName): void
    {
        $this->AppName = $appName;
    }

    public function getDesktopLogo(): ?string
    {
        return $this->DesktopLogo;
    }

    public function setDesktopLogo(?string $desktopLogo): void
    {
        $this->DesktopLogo = $desktopLogo;
    }

    public function getToggleLogo(): ?string
    {
        return $this->ToggleLogo;
    }

    public function setToggleLogo(?string $toggleLogo): void
    {
        $this->ToggleLogo = $toggleLogo;
    }

    public function getDesktopWhiteLogo(): ?string
    {
        return $this->DesktopWhiteLogo;
    }

    public function setDesktopWhiteLogo(?string $desktopWhiteLogo): void
    {
        $this->DesktopWhiteLogo = $desktopWhiteLogo;
    }

    public function getToggleWhiteLogo(): ?string
    {
        return $this->ToggleWhiteLogo;
    }

    public function setToggleWhiteLogo(?string $toggleWhiteLogo): void
    {
        $this->ToggleWhiteLogo = $toggleWhiteLogo;
    }
}
