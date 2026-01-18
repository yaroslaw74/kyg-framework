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

namespace App\Modules\Charts\Service;

use App\Modules\Charts\Widgets\WidgetsInterface;
use Twig\Environment;

class WidgetsServise
{
    public function __construct(private Environment $twig)
    {
    }

    public function render(WidgetsInterface $widget): string
    {
        $htmlContents = $this->twig->render('@Chart/widget.html.twig', [
            'widget' => $widget,
        ]);

        return $htmlContents;
    }
}
