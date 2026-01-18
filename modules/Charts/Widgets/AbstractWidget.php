<?php

/**
 * KYG Framework for Business.
 *
 * @category   Abstract Widget
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Charts\Widgets;

abstract class AbstractWidget implements WidgetsInterface
{
    protected string $type;

    protected string $name;

    protected array $options; // @phpstan-ignore missingType.iterableValue

    public function getType(): string
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getOptions(): array // @phpstan-ignore missingType.iterableValue
    {
        return $this->options;
    }

    /**
     * @param array<string, string|int> $options
     * @param array<string, float|int>  $data
     */
    abstract protected function render(array $options, array $data): void;
}
