<?php

/**
 * KYG Framework for Business.
 *
 * @category Settings
 *
 * @version 1.0.0
 *
 * @copyright Copyright (c) Kataev Yaroslav
 * @license GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Settings;

use App\Modules\Config\Storage\ORMUsersStorageAdapter;
use Jbtronics\SettingsBundle\ParameterTypes\StringType;
use Jbtronics\SettingsBundle\Settings\Settings;
use Jbtronics\SettingsBundle\Settings\SettingsParameter;
use Jbtronics\SettingsBundle\Settings\SettingsTrait;

#[Settings(name: 'users', dependencyInjectable: true, storageAdapter: ORMUsersStorageAdapter::class)]
class UsersSettings
{
    use SettingsTrait;

    #[SettingsParameter(type: StringType::class)]
    private string $swup = 'fade';

    public function getSwup(): string
    {
        return $this->swup;
    }

    public function setSwup(string $swup): void
    {
        $this->swup = $swup;
    }
}
