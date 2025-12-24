<?php

/********************************************************************************
 * @Project    KYG Framework for Business
 * @Version    1.0.0
 *
 * @Copyright  (C) Kataev Yaroslav
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later; see LICENSE
 ********************************************************************************/
declare(strict_types=1);

namespace App\Twig;

use App\Service\SystemService;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppTwigExtension extends AbstractExtension
{
    public function __construct(
        private SystemService $systemService,
        private ContainerBagInterface $params,
    ) {
    }

    public function getLocales(): array
    {
        return $this->params->get('app.locales');
    }

    public function LocaleDirExtension(string $locale): string
    {
        $locales = $this->getLocales();

        return $locales[$locale]['dir'];
    }

    public function LocaleHTMLExtension(string $locale): string
    {
        return $this->systemService->getLocaleHTML($locale);
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('locale_dir', [$this, 'LocaleDirExtension']),
            new TwigFunction('locale_HTML', [$this, 'LocaleHTMLExtension']),
        ];
    }
}
