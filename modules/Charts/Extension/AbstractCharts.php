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

namespace App\Modules\Charts\Extension;

use App\Modules\Charts\Extension\ChartsInterface;

abstract class AbstractCharts implements ChartsInterface
{
    protected string $script;

    protected string $name;

    /**
     * @var array<string, mixed>
     */
    protected array $options;

    public function getScript(): string
    {
        return $this->script;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array<string, mixed>
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}
