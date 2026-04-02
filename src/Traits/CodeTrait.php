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

namespace App\Traits;

use App\Entity\Code;
use Doctrine\ORM\Mapping as ORM;

trait CodeTrait
{
    #[ORM\OneToOne(inversedBy: 'element', cascade: ['remove'])]
    #[ORM\JoinColumn(nullable: true)]
    private ?Code $code = null;

    public function getCode(): ?Code
    {
        return $this->code;
    }

    public function addCode(): static
    {
        $code = new Code();
        $code->setTarget(static::class);
        $code->setElement($this);
        $this->code = $code;

        return $this;
    }
}
