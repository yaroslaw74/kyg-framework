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
use Jbtronics\SettingsBundle\ParameterTypes\StringType;
use Jbtronics\SettingsBundle\Settings\Settings;
use Jbtronics\SettingsBundle\Settings\SettingsParameter;
use Jbtronics\SettingsBundle\Settings\SettingsTrait;
use Jbtronics\SettingsBundle\Storage\PHPFileStorageAdapter;

#[Settings(name: 'hwi', dependencyInjectable: true, storageAdapter: PHPFileStorageAdapter::class, storageAdapterOptions: ['filename' => 'HwiOauthSettings.php'])]
class hwiOauthSettings
{
    use SettingsTrait;

    #[SettingsParameter(type: BoolType::class)]
    private bool $hwiOauth = false;

    #[SettingsParameter(type: BoolType::class)]
    private bool $facebook = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:FACEBOOK_ID')]
    private ?string $facebookID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:FACEBOOK_SECRET')]
    private ?string $facebookSecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $yandex = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:YANDEX_ID')]
    private ?string $yandexID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:YANDEX_SECRET')]
    private ?string $yandexSecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $google = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:GOOGLE_ID')]
    private ?string $googleID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:GOOGLE_SECRET')]
    private ?string $googleSecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $linkedin = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:LINKEDIN_ID')]
    private ?string $linkedinID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:LINKEDIN_SECRET')]
    private ?string $linkedinSecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $mailru = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:MAILRU_ID')]
    private ?string $mailruID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:MAILRU_SECRET')]
    private ?string $mailruSecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $odnoklassniki = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:ODNOKLASSNIKI_ID')]
    private ?string $odnoklassnikiID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:ODNOKLASSNIKI_SECRET')]
    private ?string $odnoklassnikiSecret = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:ODNOKLASSNIKI_APPLICATION_KEY')]
    private ?string $odnoklassnikiApplicationKey = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $xTwitter = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:TWITTER_CONSUMER_KEY')]
    private ?string $xTwitterID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:TWITTER_CONSUMER_SECRET')]
    private ?string $xTwitterSecret = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:VKONTAKTE_ID')]
    private ?string $vkontakteID = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $vkontakte = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:VKONTAKTE_SECRET')]
    private ?string $vkontakteSecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $github = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:GITHUB_ID')]
    private ?string $githubID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:GITHUB_SECRET')]
    private ?string $githubSecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $amazon = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:AMAZON_ID')]
    private ?string $amazonID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:AMAZON_SECRET')]
    private ?string $amazonSecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $instagram = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:INSTAGRAM_ID')]
    private ?string $instagramID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:INSTAGRAM_SECRET')]
    private ?string $instagramSecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $twitch = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:TWITCH_ID')]
    private ?string $twitchID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:TWITCH_SECRET')]
    private ?string $twitchSecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $yahoo = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:YAHOO_ID')]
    private ?string $yahooID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:YAHOO_SECRET')]
    private ?string $yahooSecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $spotify = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:SPOTIFY_ID')]
    private ?string $spotifyID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:SPOTIFY_SECRET')]
    private ?string $spotifySecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $trello = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:TRELLO_ID')]
    private ?string $trelloID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:TRELLO_SECRET')]
    private ?string $trelloSecret = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:TRELLO_APPLICATION')]
    private ?string $trelloApplication = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:TRELLO_SCOPES')]
    private ?string $trelloScopes = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:TRELLO_EXPIRATION')]
    private ?string $trelloExpiration = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $dropbox = false;

    #[SettingsParameter(type: BoolType::class, envVar: 'DROPBOX_ID')]
    private ?string $dropboxID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:DROPBOX_SECRET')]
    private ?string $dropboxSecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $flickr = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:FLICKR_ID')]
    private ?string $flickrID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:FLICKR_SECRET')]
    private ?string $flickrSecret = null;

    #[SettingsParameter(type: BoolType::class)]
    private bool $windowsLive = false;

    #[SettingsParameter(type: StringType::class, envVar: 'string:WINDOWS_LIVE_ID')]
    private ?string $windowsLiveID = null;

    #[SettingsParameter(type: StringType::class, envVar: 'string:WINDOWS_LIVE_SECRET')]
    private ?string $windowsLiveSecret = null;

    public function getHwiOauth(): bool
    {
        return $this->hwiOauth;
    }

    public function setHwiOauth(bool $hwiOauth): void
    {
        $this->hwiOauth = $hwiOauth;
    }

    public function getFacebook(): bool
    {
        return $this->facebook;
    }

    public function setFacebook(bool $facebook): void
    {
        $this->facebook = $facebook;
    }

    public function getFacebookID(): ?string
    {
        return $this->facebookID;
    }

    public function setFacebookID(string $facebookID): void
    {
        $this->facebookID = $facebookID;
    }

    public function getFacebookSecret(): ?string
    {
        return $this->facebookSecret;
    }

    public function setFacebookSecret(string $facebookSecret): void
    {
        $this->facebookSecret = $facebookSecret;
    }

    public function getYandex(): bool
    {
        return $this->yandex;
    }

    public function setYandex(bool $yandex): void
    {
        $this->yandex = $yandex;
    }

    public function getYandexID(): ?string
    {
        return $this->yandexID;
    }

    public function setYandexID(string $yandexID): void
    {
        $this->yandexID = $yandexID;
    }

    public function getYandexSecret(): ?string
    {
        return $this->yandexSecret;
    }

    public function setYandexSecret(string $yandexSecret): void
    {
        $this->yandexSecret = $yandexSecret;
    }

    public function getGoogle(): bool
    {
        return $this->google;
    }

    public function setGoogle(bool $google): void
    {
        $this->google = $google;
    }

    public function getGoogleID(): ?string
    {
        return $this->googleID;
    }

    public function setGoogleID(string $googleID): void
    {
        $this->googleID = $googleID;
    }

    public function getGoogleSecret(): ?string
    {
        return $this->googleSecret;
    }

    public function setGoogleSecret(string $googleSecret): void
    {
        $this->googleSecret = $googleSecret;
    }

    public function getLinkedin(): bool
    {
        return $this->linkedin;
    }

    public function setLinkedin(bool $linkedin): void
    {
        $this->linkedin = $linkedin;
    }

    public function getLinkedinID(): ?string
    {
        return $this->linkedinID;
    }

    public function setLinkedinID(string $linkedinID): void
    {
        $this->linkedinID = $linkedinID;
    }

    public function getLinkedinSecret(): ?string
    {
        return $this->linkedinSecret;
    }

    public function setLinkedinSecret(string $linkedinSecret): void
    {
        $this->linkedinSecret = $linkedinSecret;
    }

    public function getMailru(): bool
    {
        return $this->mailru;
    }

    public function setMailru(bool $mailru): void
    {
        $this->mailru = $mailru;
    }

    public function getMailruID(): ?string
    {
        return $this->mailruID;
    }

    public function setMailruID(string $mailruID): void
    {
        $this->mailruID = $mailruID;
    }

    public function getMailruSecret(): ?string
    {
        return $this->mailruSecret;
    }

    public function setMailruSecret(string $mailruSecret): void
    {
        $this->mailruSecret = $mailruSecret;
    }

    public function grtOdnoklassniki(): bool
    {
        return $this->odnoklassniki;
    }

    public function setOdnoklassniki(bool $odnoklassniki): void
    {
        $this->odnoklassniki = $odnoklassniki;
    }

    public function getOdnoklassnikiID(): ?string
    {
        return $this->odnoklassnikiID;
    }

    public function setOdnoklassnikiID(string $odnoklassnikiID): void
    {
        $this->odnoklassnikiID = $odnoklassnikiID;
    }

    public function getOdnoklassnikiSecret(): ?string
    {
        return $this->odnoklassnikiSecret;
    }

    public function setOdnoklassnikiSecret(string $odnoklassnikiSecret): void
    {
        $this->odnoklassnikiSecret = $odnoklassnikiSecret;
    }

    public function getOdnoklassnikiApplicationKey(): ?string
    {
        return $this->odnoklassnikiApplicationKey;
    }

    public function setOdnoklassnikiApplicationKey(string $odnoklassnikiApplicationKey): void
    {
        $this->odnoklassnikiApplicationKey = $odnoklassnikiApplicationKey;
    }

    public function getXTwitter(): bool
    {
        return $this->xTwitter;
    }

    public function setXTwitter(bool $xTwitter): void
    {
        $this->xTwitter = $xTwitter;
    }

    public function getXTwitterID(): ?string
    {
        return $this->xTwitterID;
    }

    public function setXTwitterID(string $xTwitterID): void
    {
        $this->xTwitterID = $xTwitterID;
    }

    public function getXTwitterSecret(): ?string
    {
        return $this->xTwitterSecret;
    }

    public function setXTwitterSecret(string $xTwitterSecret): void
    {
        $this->xTwitterSecret = $xTwitterSecret;
    }

    public function getVkontakte(): bool
    {
        return $this->vkontakte;
    }

    public function setVkontakte(bool $vkontakte): void
    {
        $this->vkontakte = $vkontakte;
    }

    public function getVkontakteID(): ?string
    {
        return $this->vkontakteID;
    }

    public function setVkontakteID(string $vkontakteID): void
    {
        $this->vkontakteID = $vkontakteID;
    }

    public function getVkontakteSecret(): ?string
    {
        return $this->vkontakteSecret;
    }

    public function setVkontakteSecret(string $vkontakteSecret): void
    {
        $this->vkontakteSecret = $vkontakteSecret;
    }

    public function getGithub(): bool
    {
        return $this->github;
    }

    public function setGithub(bool $github): void
    {
        $this->github = $github;
    }

    public function getGithubID(): ?string
    {
        return $this->githubID;
    }

    public function setGithubID(string $githubID): void
    {
        $this->githubID = $githubID;
    }

    public function getGithubSecret(): ?string
    {
        return $this->githubSecret;
    }

    public function setGithubSecret(string $githubSecret): void
    {
        $this->githubSecret = $githubSecret;
    }

    public function getAmazon(): bool
    {
        return $this->amazon;
    }

    public function setAmazon(bool $amazon): void
    {
        $this->amazon = $amazon;
    }

    public function getAmazonID(): ?string
    {
        return $this->amazonID;
    }

    public function setAmazonID(string $amazonID): void
    {
        $this->amazonID = $amazonID;
    }

    public function getAmazonSecret(): ?string
    {
        return $this->amazonSecret;
    }

    public function setAmazonSecret(string $amazonSecret): void
    {
        $this->amazonSecret = $amazonSecret;
    }

    public function getInstagram(): bool
    {
        return $this->instagram;
    }

    public function setInstagram(bool $instagram): void
    {
        $this->instagram = $instagram;
    }

    public function getInstagramID(): ?string
    {
        return $this->instagramID;
    }

    public function setInstagramID(string $instagramID): void
    {
        $this->instagramID = $instagramID;
    }

    public function getInstagramSecret(): ?string
    {
        return $this->instagramSecret;
    }

    public function setInstagramSecret(string $instagramSecret): void
    {
        $this->instagramSecret = $instagramSecret;
    }

    public function getTwitch(): bool
    {
        return $this->twitch;
    }

    public function setTwitch(bool $twitch): void
    {
        $this->twitch = $twitch;
    }

    public function getTwitchID(): ?string
    {
        return $this->twitchID;
    }

    public function setTwitchID(string $twitchID): void
    {
        $this->twitchID = $twitchID;
    }

    public function getTwitchSecret(): ?string
    {
        return $this->twitchSecret;
    }

    public function setTwitchSecret(string $twitchSecret): void
    {
        $this->twitchSecret = $twitchSecret;
    }

    public function getYahoo(): bool
    {
        return $this->yahoo;
    }

    public function setYahoo(bool $yahoo): void
    {
        $this->yahoo = $yahoo;
    }

    public function getYahooID(): ?string
    {
        return $this->yahooID;
    }

    public function setYahooID(string $yahooID): void
    {
        $this->yahooID = $yahooID;
    }

    public function getYahooSecret(): ?string
    {
        return $this->yahooSecret;
    }

    public function setYahooSecret(string $yahooSecret): void
    {
        $this->yahooSecret = $yahooSecret;
    }

    public function getSpotify(): bool
    {
        return $this->spotify;
    }

    public function setSpotify(bool $spotify): void
    {
        $this->spotify = $spotify;
    }

    public function getSpotifyID(): ?string
    {
        return $this->spotifyID;
    }

    public function setSpotifyID(string $spotifyID): void
    {
        $this->spotifyID = $spotifyID;
    }

    public function getSpotifySecret(): ?string
    {
        return $this->spotifySecret;
    }

    public function setSpotifySecret(string $spotifySecret): void
    {
        $this->spotifySecret = $spotifySecret;
    }

    public function getTrello(): bool
    {
        return $this->trello;
    }

    public function setTrello(bool $trello): void
    {
        $this->trello = $trello;
    }

    public function getTrelloSecret(): ?string
    {
        return $this->trelloSecret;
    }

    public function setTrelloSecret(string $trelloSecret): void
    {
        $this->trelloSecret = $trelloSecret;
    }

    public function getTrelloID(): ?string
    {
        return $this->trelloID;
    }

    public function setTrelloID(string $trelloID): void
    {
        $this->trelloID = $trelloID;
    }

    public function getTrelloApplication(): ?string
    {
        return $this->trelloApplication;
    }

    public function setTrelloApplication(string $trelloApplication): void
    {
        $this->trelloApplication = $trelloApplication;
    }

    public function getTrelloScopes(): ?string
    {
        return $this->trelloScopes;
    }

    public function setTrelloScopes(string $trelloScopes): void
    {
        $this->trelloScopes = $trelloScopes;
    }

    public function getTrelloExpiration(): ?string
    {
        return $this->trelloExpiration;
    }

    public function setTrelloExpiration(string $trelloExpiration): void
    {
        $this->trelloExpiration = $trelloExpiration;
    }

    public function getDrobox(): bool
    {
        return $this->dropbox;
    }

    public function setDrobox(bool $dropbox): void
    {
        $this->dropbox = $dropbox;
    }

    public function getDroboxID(): ?string
    {
        return $this->dropboxID;
    }

    public function setDroboxID(string $dropboxID): void
    {
        $this->dropboxID = $dropboxID;
    }

    public function getDroboxSecret(): ?string
    {
        return $this->dropboxSecret;
    }

    public function setDroboxSecret(string $dropboxSecret): void
    {
        $this->dropboxSecret = $dropboxSecret;
    }

    public function getFlickr(): bool
    {
        return $this->flickr;
    }

    public function setFlickr(bool $flickr): void
    {
        $this->flickr = $flickr;
    }

    public function getFlickrID(): ?string
    {
        return $this->flickrID;
    }

    public function setFlickrID(string $flickrID): void
    {
        $this->flickrID = $flickrID;
    }

    public function getFlickrSecret(): ?string
    {
        return $this->flickrSecret;
    }

    public function setFlickrSecret(string $flickrSecret): void
    {
        $this->flickrSecret = $flickrSecret;
    }

    public function getWindowsLive(): bool
    {
        return $this->windowsLive;
    }

    public function setWindowsLive(bool $windowsLive): void
    {
        $this->windowsLive = $windowsLive;
    }

    public function getWindowsLiveID(): ?string
    {
        return $this->windowsLiveID;
    }

    public function setWindowsLiveID(string $windowsLiveID): void
    {
        $this->windowsLiveID = $windowsLiveID;
    }

    public function getWindowsLiveSecret(): ?string
    {
        return $this->windowsLiveSecret;
    }

    public function setWindowsLiveSecret(string $windowsLiveSecret): void
    {
        $this->windowsLiveSecret = $windowsLiveSecret;
    }
}
