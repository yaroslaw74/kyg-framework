<?php

/**
 * KYG Framework for Business.
 *
 * @category   Twig Extension
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Twig;

use App\Service\LocalesService;
use App\Settings\TwigGlobalsSettings;
use Jbtronics\SettingsBundle\Manager\SettingsManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\Extension\ExtensionInterface;
use Twig\Extension\GlobalsInterface;
use Twig\TwigFunction;

class AppTwigExtension extends AbstractExtension implements ExtensionInterface, GlobalsInterface
{
    public function __construct(
        private readonly LocalesService $localesService,
        private readonly SettingsManagerInterface $settingsManager,
    ) {
    }

    /**
     * @return TwigFunction[]
     */
    #[\Override]
    public function getFunctions(): array
    {
        return [
            new TwigFunction('locale_dir', fn (string $locale): string => $this->localesService->getLocaleDir($locale)),
            new TwigFunction('locale_HTML', fn (string $locale): string => $this->localesService->getLocaleHTML($locale)),
            new TwigFunction('locale_Full', fn (string $locale): bool => $this->localesService->isFull($locale)),
        ];
    }

    /**
     * @return array<string, string|bool>
     */
    public function getGlobals(): array
    {
        $settings = $this->settingsManager->get(TwigGlobalsSettings::class);

        return [
            'app_name' => $settings->getName(),
            'app_desktop_logo' => $settings->getDesktopLogo(),
            'app_toggle_logo' => $settings->getToggleLogo(),
            'app_desktop_white' => $settings->getDesktopWhite(),
            'app_toggle_white' => $settings->getToggleWhite(),
        ];
    }
}
