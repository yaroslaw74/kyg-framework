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

class MissingNullValuesChart extends AbstractCharts
{
    protected string $script = 'null-chart';

    protected array $options = [
        'series' => [
            'one' => [
                'name' => '',
                'data' => [],
            ],
            'two' => [
                'name' => '',
                'data' => [],
            ],
            'three' => [
                'name' => '',
                'data' => [],
            ],
        ],
        'title' => [
            'text' => '',
            'align' => 'left',
        ],
        'labels' => [],
        'xaxis' => [
            'title' => '',
        ],
        'yaxis' => [
            'title' => '',
            'min' => 0,
            'max' => 0,
        ],
        'dec' => 1,
    ];

    public function setSeriesOneName(string $name): void
    {
        $this->options['series']['one']['name'] = $name;
    }

    public function setSeriesTwoName(string $name): void
    {
        $this->options['series']['two']['name'] = $name;
    }

    public function setSeriesThreeName(string $name): void
    {
        $this->options['series']['three']['name'] = $name;
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
     * @param array<\DateTime|string|int, int|float|null> $one
     * @param array<\DateTime|string|int, int|float|null> $two
     * @param array<\DateTime|string|int, int|float|null> $three
     */
    public function setData(array $one, array $two, array $three): void
    {
        foreach ($one as $key => $value) {
            $this->options['labels'][] = $key;

            $this->options['series']['one']['data'][] = $value;
            $this->options['series']['two']['data'][] = $two[$key];
            $this->options['series']['three']['data'][] = $three[$key];

            if (null !== $value) {
                if ($value > $this->options['yaxis']['max']) {
                    $this->options['yaxis']['max'] = $value;
                    if (0 == $this->options['yaxis']['min']) {
                        $this->options['yaxis']['min'] = $value;
                    }
                }

                if ($value < $this->options['yaxis']['min']) {
                    $this->options['yaxis']['min'] = $value;
                }
            }

            if (null !== $two[$key]) {
                if ($two[$key] > $this->options['yaxis']['max']) {
                    $this->options['yaxis']['max'] = $two[$key];
                    if (0 == $this->options['yaxis']['min']) {
                        $this->options['yaxis']['min'] = $two[$key];
                    }
                }

                if ($two[$key] < $this->options['yaxis']['min']) {
                    $this->options['yaxis']['min'] = $two[$key];
                }
            }

            if (null !== $three[$key]) {
                if ($three[$key] > $this->options['yaxis']['max']) {
                    $this->options['yaxis']['max'] = $three[$key];
                    if (0 == $this->options['yaxis']['min']) {
                        $this->options['yaxis']['min'] = $three[$key];
                    }
                }

                if ($three[$key] < $this->options['yaxis']['min']) {
                    $this->options['yaxis']['min'] = $three[$key];
                }
            }
        }
    }

    public function addDate(\DateTime|string|int $labels, int|float|null $one, int|float|null $two, int|float|null $three): void
    {
        $this->options['labels'][] = $labels;
        $this->options['series']['one']['data'][] = $one;
        $this->options['series']['two']['data'][] = $two;
        $this->options['series']['three']['data'][] = $three;

        if (null !== $one) {
            if ($one > $this->options['yaxis']['max']) {
                $this->options['yaxis']['max'] = $one;
                if (0 == $this->options['yaxis']['min']) {
                    $this->options['yaxis']['min'] = $one;
                }
            }

            if ($one < $this->options['yaxis']['min']) {
                $this->options['yaxis']['min'] = $one;
            }
        }

        if (null !== $two) {
            if ($two > $this->options['yaxis']['max']) {
                $this->options['yaxis']['max'] = $two;
                if (0 == $this->options['yaxis']['min']) {
                    $this->options['yaxis']['min'] = $two;
                }
            }

            if ($two < $this->options['yaxis']['min']) {
                $this->options['yaxis']['min'] = $two;
            }
        }

        if (null !== $three) {
            if ($three > $this->options['yaxis']['max']) {
                $this->options['yaxis']['max'] = $three;
                if (0 == $this->options['yaxis']['min']) {
                    $this->options['yaxis']['min'] = $three;
                }
            }

            if ($three < $this->options['yaxis']['min']) {
                $this->options['yaxis']['min'] = $three;
            }
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
