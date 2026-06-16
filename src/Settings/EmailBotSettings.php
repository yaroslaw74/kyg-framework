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

use Jbtronics\SettingsBundle\ParameterTypes\StringType;
use Jbtronics\SettingsBundle\Settings\Settings;
use Jbtronics\SettingsBundle\Settings\SettingsParameter;
use Jbtronics\SettingsBundle\Settings\SettingsTrait;
use Jbtronics\SettingsBundle\Storage\PHPFileStorageAdapter;

#[Settings(dependencyInjectable: true, storageAdapter: PHPFileStorageAdapter::class, storageAdapterOptions: ['filename' => 'EmailBotSettings.php'])]
class EmailBotSettings
{
    use SettingsTrait;

    #[SettingsParameter(type: StringType::class)]
    private string $botEmail = 'mailer@your-domain.com';

    #[SettingsParameter(type: StringType::class)]
    private string $botName = 'Acme Mail Bot';

    public function getBotEmail(): string
    {
        return $this->botEmail;
    }

    public function setBotEmail(string $botEmail): void
    {
        $this->botEmail = $botEmail;
    }

    public function getBotName(): string
    {
        return $this->botName;
    }

    public function setBotName(string $botName): void
    {
        $this->botName = $botName;
    }
}
