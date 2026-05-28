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

class BasicLineChart extends AbstractCharts
{
    protected string $script = 'line-chart';

    protected array $options = [
        'series' => [
            'name' => '',
            'data' => [],
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
        'dec' => 1,
    ];

    public function setSeriesName(string $name): void
    {
        $this->options['series']['name'] = $name;
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

    public function setDec(int $dec): void
    {
        $this->options['dec'] = $dec;
    }

    /**
     * @param array<\DateTime|string|int, int|float> $data
     */
    public function setData(array $data): void
    {
        foreach ($data as $key => $value) {
            $this->options['xaxis']['categories'][] = $key;
            $this->options['series']['data'][] = $value;

            if ($value > $this->options['yaxis']['max']) {
                $this->options['yaxis']['max'] = $value;
                if (0 === $this->options['yaxis']['min']) {
                    $this->options['yaxis']['min'] = $value;
                }
            }

            if ($value < $this->options['yaxis']['min']) {
                $this->options['yaxis']['min'] = $value;
            }
        }
    }

    public function addDate(\DateTime|string|int $categories, int|float $data): void
    {
        $this->options['xaxis']['categories'][] = $categories;
        $this->options['series']['data'][] = $data;

        if ($data > $this->options['yaxis']['max']) {
            $this->options['yaxis']['max'] = $data;
            if (0 === $this->options['yaxis']['min']) {
                $this->options['yaxis']['min'] = $data;
            }
        }

        if ($data < $this->options['yaxis']['min']) {
            $this->options['yaxis']['min'] = $data;
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
