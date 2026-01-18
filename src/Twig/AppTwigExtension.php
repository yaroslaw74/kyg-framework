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

use App\Service\SystemService;
use Twig\Extension\AbstractExtension;
use Twig\Extension\ExtensionInterface;
use Twig\TwigFunction;

class AppTwigExtension extends AbstractExtension implements ExtensionInterface
{
    public function __construct(private SystemService $systemService)
    {
    }

    public function LocaleDirExtension(string $locale): string
    {
        return $this->systemService->getLocaleDir($locale);
    }

    public function LocaleHTMLExtension(string $locale): string
    {
        return $this->systemService->getLocaleHTML($locale);
    }

    public function LocaleIsFull(string $locale): bool
    {
        return $this->systemService->isFull($locale);
    }

    /**
     * Summary of getFunctions.
     *
     * @return TwigFunction[]
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('locale_dir', [$this, 'LocaleDirExtension']),
            new TwigFunction('locale_HTML', [$this, 'LocaleHTMLExtension']),
            new TwigFunction('locale_Fuul', [$this, 'LocaleIsFull']),
        ];
    }
}
