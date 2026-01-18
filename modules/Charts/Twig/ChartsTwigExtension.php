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

namespace App\Modules\Charts\Twig;

use App\Modules\Charts\Service\WidgetsServise;
use App\Modules\Charts\Widgets\WidgetsInterface;
use Twig\Extension\AbstractExtension;
use Twig\Extension\ExtensionInterface;
use Twig\TwigFunction;

class ChartsTwigExtension extends AbstractExtension implements ExtensionInterface
{
    public function __construct(private WidgetsServise $WidgetService)
    {
    }

    public function WidgetRender(WidgetsInterface $widget): string
    {
        return $this->WidgetService->render($widget);
    }

    /**
     * Summary of getFunctions.
     *
     * @return TwigFunction[]
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('widget', [$this, 'WidgetRender']),
        ];
    }
}
