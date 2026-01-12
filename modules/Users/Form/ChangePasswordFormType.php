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
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotCompromisedPassword;
use Symfony\Component\Validator\Constraints\PasswordStrength;

class ChangePasswordFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('plainPassword', RepeatedType::class, [
                    'type' => PasswordType::class,
                    'options' => [
                        'attr' => [
                            'autocomplete' => 'new-password',
                        ],
                    ],
                    'first_options' => [
                        'constraints' => [
                            new NotBlank([
                                'message' => 'Please enter a password',
                            ]),
                            new Length([
                                'min' => 12,
                                'minMessage' => 'Your password should be at least {{ limit }} characters',
                                // max length allowed by Symfony for security reasons
                                'max' => 4096,
                            ]),
                            new PasswordStrength(),
                            new NotCompromisedPassword(),
                        ],
                        'label' => 'New password',
                    ],
                    'second_options' => [
                        'label' => 'Repeat Password',
                    ],
                    'invalid_message' => 'The password fields must match.',
                    // Instead of being set onto the object directly,
                    // this is read and encoded in the controller
                    'mapped' => false,
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
