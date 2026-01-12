<?php
/**
 * KYG Framework for Business.
 *
 * @category   Form
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
namespace App\Modules\Users\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ResetPasswordRequestFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                    'attr' => ['autocomplete' => 'email'],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Please enter your email',
                        ]),
                    ],
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
