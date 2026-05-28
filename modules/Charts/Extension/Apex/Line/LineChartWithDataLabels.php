<?php

/**
 * KYG Framework for Business.
 *
 * @category Charts Extension Abstract Class
 *
 * @version 1.0.0
 *
 * @copyright Copyright (c) Kataev Yaroslav
 * @license GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Charts\Extension\Apex\Line;

use App\Modules\Charts\Extension\AbstractCharts;

class LineChartWithDataLabels extends AbstractCharts
{
    protected string $script = 'line-chart-datalabels';

    protected array $options = [
        'series' => [
            'top' => [
                'name' => '',
                'data' => [],
            ],
            'botom' => [
                'name' => '',
                'data' => [],
            ],
        ],
        'title' => [
            'text' => '',
            'align' => 'left',
        ],
        'xaxis' => [
            'categories' => [],
            'title' => '',
        ],
        'yaxis' => [
            'title' => '',
            'min' => 0,
            'max' => 0,
        ],
        'legend' => [
            'position' => 'top',
            'align' => 'right',
        ],
        'dec' => 1,
    ];

    public function setSeriesTopName(string $name): void
    {
        $this->options['series']['top']['name'] = $name;
    }

    public function setSeriesBotomName(string $name): void
    {
        $this->options['series']['botom']['name'] = $name;
    }

    public function setTitle(string $text, string $align = 'left'): void
    {
        $this->options['title']['text'] = $text;
        $this->options['title']['align'] = $align;
    }

    public function setXaxisTitle(string $text): void
    {
        $this->options['xaxis']['title'] = $text;
    }

    public function setYaxisTitle(string $text): void
    {
        $this->options['yaxis']['title'] = $text;
    }

    public function setLegendPosition(string $position = 'top', string $align = 'right'): void
    {
        $this->options['legend']['position'] = $position;
        $this->options['legend']['align'] = $align;
    }

    public function setDec(int $dec): void
    {
        $this->options['dec'] = $dec;
    }

    /**
     * @param array<\DateTime|string|int, mixed> $data
     */
    public function setData(array $data): void
    {
        foreach ($data as $key => $value) {
            $this->options['xaxis']['categories'][] = $key;

            $dataTop = current($value);
            $dataBotom = next($value);

            $this->options['series']['top']['data'][] = $dataTop;
            $this->options['series']['botom']['data'][] = $dataBotom;

            if ($dataTop > $this->options['yaxis']['max']) {
                $this->options['yaxis']['max'] = $dataTop;
                if (0 === $this->options['yaxis']['min']) {
                    $this->options['yaxis']['min'] = $dataTop;
                }
            }

            if ($dataTop < $this->options['yaxis']['min']) {
                $this->options['yaxis']['min'] = $dataTop;
            }

            if ($dataBotom < $this->options['yaxis']['min']) {
                $this->options['yaxis']['min'] = $dataBotom;
            }

            if ($dataBotom > $this->options['yaxis']['max']) {
                $this->options['yaxis']['max'] = $dataBotom;
            }
        }
    }

    public function addDate(\DateTime|string|int $categories, int|float $dataTop, int|float $dataBotom): void
    {
        $this->options['xaxis']['categories'][] = $categories;
        $this->options['series']['top']['data'][] = $dataTop;
        $this->options['series']['botom']['data'][] = $dataBotom;

        if ($dataBotom > $this->options['yaxis']['max']) {
            $this->options['yaxis']['max'] = $dataBotom;
            if (0 === $this->options['yaxis']['min']) {
                $this->options['yaxis']['min'] = $dataBotom;
            }
        }

        if ($dataBotom < $this->options['yaxis']['min']) {
            $this->options['yaxis']['min'] = $dataBotom;
        }

        if ($dataTop < $this->options['yaxis']['min']) {
            $this->options['yaxis']['min'] = $dataTop;
        }

        if ($dataTop > $this->options['yaxis']['max']) {
            $this->options['yaxis']['max'] = $dataTop;
        }
    }

    public function setYaxisMin(int|float $min): void
    {
        $this->options['yaxis']['min'] = $min;
    }

    public function setYaxisMax(int|float $max): void
    {
        $this->options['yaxis']['max'] = $max;
    }
}
