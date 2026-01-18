<?php

/**
 * KYG Framework for Business.
 *
 * @category   Widgets Interface
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Charts\Widgets\ApexCharts\AreaChart;

use App\Modules\Charts\Widgets\AbstractWidget;
use App\Modules\Charts\Widgets\WidgetsInterface;

/**
 * Basic Area Chart Widget.
 *
 * var string $type = "area-basic"
 *
 * var string $name = Name of widget eg. 'Basic Area Chart'
 *
 * var array $options = [
 *      'series': [
 *          'name': Name of Chart, eg 'STOCK ABC',
 *          'data': Data of Chart, eg. [8107.85, 8128.0, 8122.9, 8165.5, 8340.7, 8423.7, 8423.5, 8514.3, 8481.85, 8487.7, 8506.9, 8626.2, 8668.95, 8602.3, 8607.55, 8512.9, 8496.25, 8600.65, 8881.1, 9340.85]
 *      ],
 *      'subtitle': [
 *          'text': Subtitle of Chart, eg.'Price Movements'
 *      ],
 *      'labels': Labels of Charteg. ["13 Nov 2017", "14 Nov 2017", "15 Nov 2017", "16 Nov 2017", "17 Nov 2017", "20 Nov 2017", "21 Nov 2017", "22 Nov 2017", "23 Nov 2017", "24 Nov 2017", "27 Nov 2017", "28 Nov 2017", "29 Nov 2017", "30 Nov 2017", "01 Dec 2017", "04 Dec 2017", "05 Dec 2017", "06 Dec 2017", "07 Dec 2017", "08 Dec
 *   'title': [
 *       'text': Title of Chsrt, eg. 'Fundamental Analysis of Stocks'
 *   ]
 *
 * var array $data = [ 'label1' => value1, 'label2' => value2, ... , 'labelN' => valueN ]
 */
final class BasicAreaChart extends AbstractWidget implements WidgetsInterface
{
    /**
     * @param array<string, float|int> $data
     */
    public function __construct(string $name, string $seriesName, string $subtitle, string $title, array $data)
    {
        $this->type = 'area-basic';
        $this->name = $name;
        $options = [
            'seriesName' => $seriesName,
            'subtitle' => $subtitle,
            'title' => $title,
        ];
        $this->render($options, $data);
    }

    /**
     * @param array<string, string|int> $options
     * @param array<string, float|int>  $data
     */
    protected function render(array $options, array $data): void
    {
        $this->options = [
            'series' => [
                'name' => $options['seriesName'],
                'data' => array_values($data),
            ],
            'subtitle' => [
                'text' => $options['subtitle'],
            ],
            'labels' => array_keys($data),
            'title' => [
                'text' => $options['title'],
            ],
        ];
    }
}
