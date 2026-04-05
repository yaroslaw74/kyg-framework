<?php

/**
 * KYG Framework for Business.
 *
 * @category   Enum
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Nomenclature\Enum;

use Symfony\Contracts\Translation\TranslatorInterface;
use Yokai\EnumBundle\NativeTranslatedEnum;
use App\Modules\Nomenclature\Enumeration\NomenclatureType;

class TypeNomenclature extends NativeTranslatedEnum
{
    public function __construct(TranslatorInterface $translator)
    {
        parent::__construct(NomenclatureType::class, $translator, '%s', 'nomenclature');
    }
}
