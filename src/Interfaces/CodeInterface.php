<?php

/**
 * KYG Framework for Business.
 *
 * @category   Trait
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Interfaces;

use App\Entity\Code;

interface CodeInterface
{
    public function getCode(): ?Code;
}
