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

#[Settings(dependencyInjectable: true, storageAdapter: PHPFileStorageAdapter::class, storageAdapterOptions: ['filename' => 'DoctrineSettings.php'])]
class DoctrineSettings
{
    use SettingsTrait;

    #[SettingsParameter(type: StringType::class, envVar: 'string:DATABASE_URL')]
    private ?string $dbalUrl = null;

    public function getDbalUrl(): ?string
    {
        return $this->dbalUrl;
    }

    public function setDbalUrl(string $dbalUrl): void
    {
        $this->dbalUrl = $dbalUrl;
    }
}
