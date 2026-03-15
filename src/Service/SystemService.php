<?php

/**
 * KYG Framework for Business.
 *
 * @category   Service
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class SystemService
{
    public function __construct(private ContainerBagInterface $params)
    {
    }

    /**
     * Summary of getLocales.
     *
     * @return array<string, array{name: string, dir: string, full: bool}>
     */
    public function getLocales(): array
    {
        return $this->params->get('app.locales');
    }

    public function getLocaleName(string $locale): string
    {
        $locales = $this->getLocales();

        return $locales[$locale]['name'];
    }

    public function getLocaleDir(string $locale): string
    {
        $locales = $this->getLocales();

        return $locales[$locale]['dir'];
    }

    public function isFull(string $locale): bool
    {
        $locales = $this->getLocales();

        return $locales[$locale]['full'];
    }

    public function getLocaleHTML(string $locale): string
    {
        str_contains($locale, '_') ? $html = str_replace('_', '-', $locale) : $html = $locale;

        return $html;
    }

    /**
     * @param string[] $locales
     */
    public function getLocaleJS(string $locale, array $locales): string
    {
        $language = $this->getLocaleHTML(mb_strtolower($locale));

        if (\in_array($language, $locales)) {
            return $language;
        }
        $poz = strrpos($language, '-');
        if (false !== $poz) {
            $language = substr($language, 0, $poz);
            if (\in_array($language, $locales)) {
                return $language;
            }
            $poz = strrpos($language, '-');
            if (false !== $poz) {
                $language = substr($language, 0, $poz);
                if (\in_array($language, $locales)) {
                    return $language;
                }
            }
        }

        return 'en';
    }
}
