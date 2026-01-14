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
use Symfony\Contracts\Translation\TranslatorInterface;

class ChangePasswordFormType extends AbstractType
{
    public function __construct(private TranslatorInterface $translator)
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('plainPassword', RepeatedType::class, [
                    'row_attr' => [
                        'class' => 'form-group mb-3'
                    ],
                    'toggle' => true,
                    'hidden_label' => 'Hide password',
                    'visible_label' => 'Show password',
                    'type' => PasswordType::class,
                    'options' => [
                        'attr' => [
                            'autocomplete' => 'new-password'
                        ]
                    ],
                    'first_options' => [
                        'constraints' => [
                            new NotBlank([
                                'message' => $this->translator->trans('Please enter a password', [], 'users')
                            ]),
                            new Length([
                                'min' => 12,
                                'minMessage' => $this->translator->trans('Your password should be at least {{ limit }} characters', [], 'users'),
                                // max length allowed by Symfony for security reasons
                                'max' => 4096
                            ]),
                            new PasswordStrength(),
                            new NotCompromisedPassword()
                        ],
                        'label' => 'New password',
                        'attr' => [
                            'placeholder' => $this->translator->trans('Enter your password', [], 'users')
                        ]
                    ],
                    'second_options' => [
                        'label' => 'Repeat Password',
                        'attr' => [
                            'placeholder' => $this->translator->trans('Enter your Confirm Password', [], 'users')
                        ]
                    ],
                    'invalid_message' => $this->translator->trans('The password fields must match.', [], 'users'),
                    // Instead of being set onto the object directly,
                    // this is read and encoded in the controller
                    'mapped' => false
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
