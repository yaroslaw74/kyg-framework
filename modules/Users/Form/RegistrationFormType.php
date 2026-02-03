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
declare(strict_types=1);

namespace App\Modules\Users\Form;

use App\Modules\Users\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @template-extends AbstractType<User>
 */
class RegistrationFormType extends AbstractType
{
    public function __construct(private TranslatorInterface $translator)
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'Username',
                'row_attr' => ['class' => 'form-group mb-3'],
                'attr' => ['placeholder' => $this->translator->trans('Enter your username', [], 'users')],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'row_attr' => ['class' => 'form-group mb-3'],
                'attr' => [
                    'autocomplete' => 'email',
                    'placeholder' => $this->translator->trans('Enter your Email', [], 'users'),
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => $this->translator->trans('Please enter your email', [], 'users'),
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'I agree to the terms and conditions',
                'row_attr' => ['class' => 'checkbox mb-3 form-check form-check-lg'],
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => $this->translator->trans('You should agree to our terms.', [], 'users'),
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => 'Password',
                'row_attr' => [
                    'class' => 'form-group mb-3',
                ],
                'toggle' => true,
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'placeholder' => $this->translator->trans('Enter your password', [], 'users'),
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => $this->translator->trans('Please enter a password', [], 'users'),
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => $this->translator->trans('Your password should be at least {{ limit }} characters', [], 'users'),
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
