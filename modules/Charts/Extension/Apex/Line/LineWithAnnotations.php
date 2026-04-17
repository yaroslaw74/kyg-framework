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
use Symfony\Component\Asset\PackageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class LineWithAnnotations extends AbstractCharts
{
    protected string $script = 'annotation-chart';

    protected array $options = [
        'series' => [
            'name' => '',
            'data' => [],
            'labels' => [],
        ],
        'annotations' => [
            'yaxis' => [
                'line' => [
                    'text' => '',
                    'data' => 0,
                ],
                'span' => [
                    'text' => '',
                    'top' => 0,
                    'botom' => 0,
                ],
            ],
            'xaxis' => [
                'line' => [
                    'text' => '',
                    'data' => null,
                ],
                'span' => [
                    'text' => '',
                    'left' => null,
                    'right' => null,
                ],
            ],
            'points' => [
                'label' => [
                    'text' => '',
                    'x' => null,
                    'y' => 0,
                ],
                'image' => [
                    'path' => '',
                    'x' => null,
                    'y' => 0,
                ],
            ],
        ],
        'title' => [
            'text' => '',
            'align' => 'left',
        ],
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

    public function setAnnotationsYaxisLine(string $text, int|float $y): void
    {
        $this->options['annotations']['yaxis']['line']['text'] = $text;
        $this->options['annotations']['yaxis']['line']['data'] = $y;
    }

    public function setAnnotationsYaxisSpan(string $text, int|float $y1, int|float $y2): void
    {
        $this->options['annotations']['yaxis']['span']['text'] = $text;
        $this->options['annotations']['yaxis']['span']['top'] = $y2;
        $this->options['annotations']['yaxis']['span']['botom'] = $y1;
    }

    public function setAnnotationsXaxisLine(string $text, \DateTime $x): void
    {
        $this->options['annotations']['xaxis']['line']['text'] = $text;
        $this->options['annotations']['xaxis']['line']['data'] = $x;
    }

    public function setAnnotationsXaxisSpan(string $text, \DateTime $x1, \DateTime $x2): void
    {
        $this->options['annotations']['xaxis']['span']['text'] = $text;
        $this->options['annotations']['xaxis']['span']['left'] = $x1;
        $this->options['annotations']['xaxis']['span']['right'] = $x2;
    }

    public function setAnnotationsPointsLabel(string $label, \DateTime $x, int|float $y): void
    {
        $this->options['annotations']['points']['label']['text'] = $label;
        $this->options['annotations']['points']['label']['x'] = $x;
        $this->options['annotations']['points']['label']['y'] = $y;
    }

    public function setAnnotationsPointsImage(UserInterface $user, \DateTime $x, int|float $y, PackageInterface $packages): void
    {
        /** @phpstan-ignore method.notFound */
        $avatar = $user->getAvatar();
        $avatar ? $path = $packages->getUrl("public/uploads/avatar/{$avatar}") : $path = $packages->getUrl('images/avatar/pngwing.com.png');

        $this->options['annotations']['points']['image']['path'] = $path;
        $this->options['annotations']['points']['image']['x'] = $x;
        $this->options['annotations']['points']['image']['y'] = $y;
    }

    public function setDec(int $dec): void
    {
        $this->options['dec'] = $dec;
    }

    /**
     * @param array<\DateTime, int|float> $data
     */
    public function setData(array $data): void
    {
        foreach ($data as $key => $value) {
            $this->options['series']['labels'][] = $key;
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

    public function addDate(\DateTime $labels, int|float $data): void
    {
        $this->options['series']['labels'][] = $labels;
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
