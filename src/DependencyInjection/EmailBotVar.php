<?php

/**
 * KYG Framework for Business.
 *
 * @category   Dependency Injection
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\DependencyInjection;

use App\Settings\EmailBotSettings;
use Jbtronics\SettingsBundle\Manager\SettingsManagerInterface;
use Symfony\Component\DependencyInjection\EnvVarLoaderInterface;

class EmailBotVar implements EnvVarLoaderInterface
{
    public function __construct(private SettingsManagerInterface $settingsManager)
    {
    }

    /**
     * @return array<string, string>
     */
    public function loadEnvVars(): array
    {
        $settings = $this->settingsManager->get(EmailBotSettings::class);

        return [
            'ENV_BOT_EMAIL' => $settings->getBotEmail(),
            'ENV_BOT_NAME' => $settings->getBotName(),
        ];
    }
}
