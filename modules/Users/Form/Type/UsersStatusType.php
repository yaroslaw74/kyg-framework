<?php

/**
 * KYG Framework for Business.
 *
 * @category   Form Type
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Users\Form\Type;

use App\Modules\Users\Entity\User;
use App\Modules\Users\Enum\StatusUsers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Yokai\EnumBundle\Form\Type\EnumType;

/**
 * @template-extends AbstractType<User>
 */
class UsersStatusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('UsersStatus', EnumType::class, [
            'enum' => StatusUsers::class,
            'enum_choice_value' => true,
        ]);
    }
}
