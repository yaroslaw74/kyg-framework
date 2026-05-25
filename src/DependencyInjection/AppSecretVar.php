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

use App\Settings\SecretSettings;
use Jbtronics\SettingsBundle\Manager\SettingsManagerInterface;
use Symfony\Component\DependencyInjection\EnvVarLoaderInterface;

final class AppSecretVar implements EnvVarLoaderInterface
{
    public function __construct(private SettingsManagerInterface $settingsManager)
    {
    }

    /**
     * @return array<string, string>
     */
    public function loadEnvVars(): array
    {
        $settings = $this->settingsManager->get(SecretSettings::class);

        return [
            'APP_SECRET' => $settings->getAppSecret(),
        ];
    }
}
