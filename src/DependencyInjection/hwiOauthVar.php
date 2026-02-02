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
            'FACEBOOK_ID' => $settings->getFacebookID(),
            'FACEBOOK_SECRET' => $settings->getFacebookSecret(),
            'YANDEX_ID' => $settings->getYandexID(),
            'YANDEX_SECRET' => $settings->getYandexSecret(),
            'GOOGLE_ID' => $settings->getGoogleID(),
            'GOOGLE_SECRET' => $settings->getGoogleSecret(),
            'LINKEDIN_ID' => $settings->getLinkedinID(),
            'LINKEDIN_SECRET' => $settings->getLinkedinSecret(),
            'MAILRU_ID' => $settings->getMailruID(),
            'MAILRU_SECRET' => $settings->getMailruSecret(),
            'ODNOKLASSNIKI_ID' => $settings->getOdnoklassnikiID(),
            'ODNOKLASSNIKI_SECRET' => $settings->getOdnoklassnikiSecret(),
            'ODNOKLASSNIKI_APPLICATION_KEY' => $settings->getOdnoklassnikiApplicationKey(),
            'TWITTER_CONSUMER_KEY' => $settings->getXTwitterID(),
            'TWITTER_CONSUMER_SECRET' => $settings->getXTwitterSecret(),
            'VKONTAKTE_ID' => $settings->getVkontakteID(),
            'VKONTAKTE_SECRET' => $settings->getXTwitterSecret(),
            'GITHUB_ID' => $settings->getGithubID(),
            'GITHUB_SECRET' => $settings->getGithubSecret(),
        ];
    }
}
