<?php

/**
 * KYG Framework for Business.
 *
 * @category   Twig Components
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Twig\Components;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class Flashes
{
    use DefaultActionTrait;

    public function __construct(private RequestStack $requestStack)
    {
    }

    /**
     * @return array<string, string[]>
     */
    public function getFlashes(): array
    {
        /*
         * @phpstan-ignore method.notFound
         */
        return $this->requestStack->getSession()->getFlashBag()->all();
    }
}
