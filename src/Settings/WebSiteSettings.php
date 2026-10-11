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
use Jbtronics\SettingsBundle\Settings\Settings;
use Jbtronics\SettingsBundle\Settings\SettingsParameter;
use Jbtronics\SettingsBundle\Settings\SettingsTrait;
use Jbtronics\SettingsBundle\Storage\PHPFileStorageAdapter;

#[Settings(name: 'WebSite', dependencyInjectable: true, storageAdapter: PHPFileStorageAdapter::class, storageAdapterOptions: ['filename' => 'WebSiteSettings.php'])]
final class WebSiteSettings
{
    use SettingsTrait;

    #[SettingsParameter(type: BoolType::class)]
    private bool $WebSiteEnabled = false;

    public function getWebSiteEnabled(): bool
    {
        return $this->WebSiteEnabled;
    }

    public function setWebSiteEnabled(bool $WebSiteEnabled): void
    {
        $this->WebSiteEnabled = $WebSiteEnabled;
    }
}
