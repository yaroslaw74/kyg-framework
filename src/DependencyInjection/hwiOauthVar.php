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

final readonly class hwiOauthVar implements EnvVarLoaderInterface
{
    public function __construct(private SettingsManagerInterface $settingsManager)
    {
    }

    /**
     * @return array<string, string>
     */
    public function loadEnvVars(): array
    {
        $hwiOauthSettings = $this->settingsManager->get(hwiOauthSettings::class);

        return [
            'FACEBOOK_ID' => $hwiOauthSettings->getFacebookID(),
            'FACEBOOK_SECRET' => $hwiOauthSettings->getFacebookSecret(),
            'YANDEX_ID' => $hwiOauthSettings->getYandexID(),
            'YANDEX_SECRET' => $hwiOauthSettings->getYandexSecret(),
            'GOOGLE_ID' => $hwiOauthSettings->getGoogleID(),
            'GOOGLE_SECRET' => $hwiOauthSettings->getGoogleSecret(),
            'LINKEDIN_ID' => $hwiOauthSettings->getLinkedinID(),
            'LINKEDIN_SECRET' => $hwiOauthSettings->getLinkedinSecret(),
            'MAILRU_ID' => $hwiOauthSettings->getMailruID(),
            'MAILRU_SECRET' => $hwiOauthSettings->getMailruSecret(),
            'ODNOKLASSNIKI_ID' => $hwiOauthSettings->getOdnoklassnikiID(),
            'ODNOKLASSNIKI_SECRET' => $hwiOauthSettings->getOdnoklassnikiSecret(),
            'ODNOKLASSNIKI_APPLICATION_KEY' => $hwiOauthSettings->getOdnoklassnikiApplicationKey(),
            'TWITTER_CONSUMER_KEY' => $hwiOauthSettings->getXTwitterID(),
            'TWITTER_CONSUMER_SECRET' => $hwiOauthSettings->getXTwitterSecret(),
            'VKONTAKTE_ID' => $hwiOauthSettings->getVkontakteID(),
            'VKONTAKTE_SECRET' => $hwiOauthSettings->getVkontakteSecret(),
            'GITHUB_ID' => $hwiOauthSettings->getGithubID(),
            'GITHUB_SECRET' => $hwiOauthSettings->getGithubSecret(),
            'AMAZON_ID' => $hwiOauthSettings->getAmazonID(),
            'AMAZON_SECRET' => $hwiOauthSettings->getAmazonSecret(),
            'INSTAGRAM_ID' => $hwiOauthSettings->getInstagramID(),
            'INSTAGRAM_SECRET' => $hwiOauthSettings->getInstagramSecret(),
            'TWITCH_ID' => $hwiOauthSettings->getTwitchID(),
            'TWITCH_SECRET' => $hwiOauthSettings->getTwitchSecret(),
            'YAHOO_ID' => $hwiOauthSettings->getYahooID(),
            'YAHOO_SECRET' => $hwiOauthSettings->getYahooSecret(),
            'SPOTIFY_ID' => $hwiOauthSettings->getSpotifyID(),
            'SPOTIFY_SECRET' => $hwiOauthSettings->getSpotifySecret(),
            'TRELLO_ID' => $hwiOauthSettings->getTrelloID(),
            'TRELLO_SECRET' => $hwiOauthSettings->getTrelloSecret(),
            'TRELLO_APPLICATION' => $hwiOauthSettings->getTrelloApplication(),
            'TRELLO_SCOPES' => $hwiOauthSettings->getTrelloScopes(),
            'TRELLO_EXPIRATION' => $hwiOauthSettings->getTrelloExpiration(),
            'DROPBOX_ID' => $hwiOauthSettings->getDroboxID(),
            'DROPBOX_SECRET' => $hwiOauthSettings->getDroboxSecret(),
            'FLICKR_ID' => $hwiOauthSettings->getFlickrID(),
            'FLICKR_SECRET' => $hwiOauthSettings->getFlickrSecret(),
            'WINDOWS_LIVE_ID' => $hwiOauthSettings->getWindowsLiveID(),
            'WINDOWS_LIVE_SECRET' => $hwiOauthSettings->getWindowsLiveSecret(),
        ];
    }
}
