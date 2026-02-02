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

use App\Settings\hwiOauthSettings;
use Jbtronics\SettingsBundle\Manager\SettingsManagerInterface;
use Symfony\Component\DependencyInjection\EnvVarLoaderInterface;

final class hwiOauthVar implements EnvVarLoaderInterface
{
    public function __construct(private SettingsManagerInterface $settingsManager)
    {
    }

    /**
     * @return array<string, string>
     */
    public function loadEnvVars(): array
    {
        $settings = $this->settingsManager->get(hwiOauthSettings::class);

        return [
            'ENV_FACEBOOK_ID' => $settings->getFacebookID(),
            'ENV_FACEBOOK_SECRET' => $settings->getFacebookSecret(),
            'ENV_YANDEX_ID' => $settings->getYandexID(),
            'ENV_YANDEX_SECRET' => $settings->getYandexSecret(),
            'ENV_GOOGLE_ID' => $settings->getGoogleID(),
            'ENV_GOOGLE_SECRET' => $settings->getGoogleSecret(),
            'ENV_LINKEDIN_ID' => $settings->getLinkedinID(),
            'ENV_LINKEDIN_SECRET' => $settings->getLinkedinSecret(),
            'ENV_MAILRU_ID' => $settings->getMailruID(),
            'ENV_MAILRU_SECRET' => $settings->getMailruSecret(),
            'ENV_ODNOKLASSNIKI_ID' => $settings->getOdnoklassnikiID(),
            'ENV_ODNOKLASSNIKI_SECRET' => $settings->getOdnoklassnikiSecret(),
            'ENV_ODNOKLASSNIKI_APPLICATION_KEY' => $settings->getOdnoklassnikiApplicationKey(),
            'ENV_X_TWITTER_CONSUMER_KEY' => $settings->getXTwitterID(),
            'ENV_X_TWITTER_CONSUMER_SECRET' => $settings->getXTwitterSecret(),
            'ENV_VKONTAKTE_ID' => $settings->getVkontakteID(),
            'ENV_VKONTAKTE_SECRET' => $settings->getXTwitterSecret(),
            'ENV_GITHUB_ID' => $settings->getGithubID(),
            'ENV_GITHUB_SECRET' => $settings->getGithubSecret(),
        ];
    }
}
