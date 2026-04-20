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

class DashedLineChart extends AbstractCharts
{
    protected string $script = 'dashed-chart';

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
        'tooltip' => [
            'one' => null,
            'two' => null,
            'three' => null,
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

    public function setTooltipOne(?string $one): void
    {
        if (null !== $one) {
            $this->options['tooltip']['one'] = " {$one}";
        } else {
            $this->options['tooltip']['one'] = null;
        }
    }

    public function setTooltipTwo(?string $two): void
    {
        if (null !== $two) {
            $this->options['tooltip']['two'] = " {$two}";
        } else {
            $this->options['tooltip']['two'] = null;
        }
    }

    public function setTooltipThree(?string $three): void
    {
        if (null !== $three) {
            $this->options['tooltip']['three'] = " {$three}";
        } else {
            $this->options['tooltip']['three'] = null;
        }
    }

    public function setDec(int $dec): void
    {
        $this->options['dec'] = $dec;
    }

    /**
     * @param array<\DateTime|string|int, int|float> $one
     * @param array<\DateTime|string|int, int|float> $two
     * @param array<\DateTime|string|int, int|float> $three
     */
    public function setData(array $one, array $two, array $three): void
    {
        foreach ($one as $key => $value) {
            $this->options['xaxis']['categories'][] = $key;

            $this->options['series']['one']['data'][] = $value;
            $this->options['series']['two']['data'][] = $two[$key];
            $this->options['series']['three']['data'][] = $three[$key];

            /* @phpstan-ignore notEqual.notAllowed */
            if (null != $value) {
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

            /* @phpstan-ignore notEqual.notAllowed */
            if (null != $two[$key]) {
                if ($two[$key] > $this->options['yaxis']['max']) {
                    $this->options['yaxis']['max'] = $two[$key];
                    if (0 === $this->options['yaxis']['min']) {
                        $this->options['yaxis']['min'] = $two[$key];
                    }
                }

                if ($two[$key] < $this->options['yaxis']['min']) {
                    $this->options['yaxis']['min'] = $two[$key];
                }
            }

            /* @phpstan-ignore notEqual.notAllowed */
            if (null != $three[$key]) {
                if ($three[$key] > $this->options['yaxis']['max']) {
                    $this->options['yaxis']['max'] = $three[$key];
                    if (0 === $this->options['yaxis']['min']) {
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
        $this->options['xaxis']['categories'][] = $labels;
        $this->options['series']['one']['data'][] = $one;
        $this->options['series']['two']['data'][] = $two;
        $this->options['series']['three']['data'][] = $three;

        if (null !== $one) {
            if ($one > $this->options['yaxis']['max']) {
                $this->options['yaxis']['max'] = $one;
                if (0 === $this->options['yaxis']['min']) {
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
                if (0 === $this->options['yaxis']['min']) {
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
                if (0 === $this->options['yaxis']['min']) {
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
