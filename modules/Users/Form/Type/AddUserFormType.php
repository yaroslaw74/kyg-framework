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
use App\Settings\NameSettings;
use Jbtronics\SettingsBundle\Manager\SettingsManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @template-extends AbstractType<User>
 */
class AddUserFormType extends AbstractType
{
    public function __construct(
        private TranslatorInterface $translator,
        private SettingsManagerInterface $settingsManager,
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label' => $this->translator->trans('Username', [], 'users'),
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group mb-3',
                ],
                'attr' => [
                    'placeholder' => $this->translator->trans('Enter Username', [], 'users'),
                ],
            ])
            ->add('lastName', TextType::class, [
                'label' => $this->translator->trans('Last Name', [], 'users'),
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group mb-3',
                ],
                'attr' => [
                    'placeholder' => $this->translator->trans('Enter Last Name', [], 'users'),
                ],
            ])
            ->add('firstName', TextType::class, [
                'label' => $this->translator->trans('First Name', [], 'users'),
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group mb-3',
                ],
                'attr' => [
                    'placeholder' => $this->translator->trans('Enter First Name', [], 'users'),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => $this->translator->trans('Email', [], 'users'),
                'row_attr' => [
                    'class' => 'form-group mb-3',
                ],
                'attr' => [
                    'placeholder' => $this->translator->trans('Enter Email', [], 'users'),
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => $this->translator->trans('Please enter Email', [], 'users'),
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => $this->translator->trans('Password', [], 'users'),
                'row_attr' => [
                    'class' => 'form-group mb-3',
                ],
                'required' => false,
                'toggle' => true,
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'placeholder' => $this->translator->trans('Enter Password', [], 'users'),
                ],
            ]);

        $settings = $this->settingsManager->get(NameSettings::class);

        if ($settings->getMiddleNameEnable()) {
            $builder->add('middleName', TextType::class, [
                'label' => $this->translator->trans('Middle Name', [], 'users'),
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group mb-3',
                ],
                'attr' => [
                    'placeholder' => $this->translator->trans('Enter Middle Name', [], 'users'),
                ],
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
