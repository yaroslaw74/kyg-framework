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

#[Settings(name: 'name', dependencyInjectable: true, storageAdapter: PHPFileStorageAdapter::class, storageAdapterOptions: ['filename' => 'NameSettings.php'])]
class NameSettings
{
    use SettingsTrait;

    #[SettingsParameter(type: BoolType::class)]
    private bool $lastNameEnable = false;

    #[SettingsParameter(type: BoolType::class)]
    private bool $firstMiddleName = true;

    public function getLastNameEnable(): bool
    {
        return $this->lastNameEnable;
    }

    public function setIastNameEnable(bool $lastNameEnable): void
    {
        $this->lastNameEnable = $lastNameEnable;
    }

    public function getFirstMiddleName(): bool
    {
        return $this->firstMiddleName;
    }

    public function setFirstMiddleName(bool $firstMiddleName): void
    {
        $this->firstMiddleName = $firstMiddleName;
    }
}
