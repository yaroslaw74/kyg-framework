<?php

/**********************************************************************************
 * @Project    KYG Framework for Business
 * @Version    1.0.0
 *
 * @Copyright  (C) Kataev Yaroslav
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later, see LICENSE
 *********************************************************************************/
declare(strict_types=1);

namespace App\Service;

class SystemService
{
    public function getLocaleHTML(string $locale): string
    {
        str_contains($locale, '_') ? $html = str_replace('_', '-', $locale) : $html = $locale;

        return $html;
    }
}
