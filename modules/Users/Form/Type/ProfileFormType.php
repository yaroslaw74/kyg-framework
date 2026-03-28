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
use libphonenumber\PhoneNumberFormat;
use Misd\PhoneNumberBundle\Form\Type\PhoneNumberType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @template-extends AbstractType<User>
 */
class ProfileFormType extends AbstractType
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
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group mb-3',
                ],
                'attr' => [
                    'placeholder' => $this->translator->trans('Enter Email', [], 'users'),
                ],
            ])
            ->add('mobile', PhoneNumberType::class, [
                'label' => $this->translator->trans('Phone', [], 'users'),
                'format' => PhoneNumberFormat::INTERNATIONAL,
                'number_type' => PhoneNumberType::NUMBER_TYPE_TEL,
                'widget' => PhoneNumberType::WIDGET_COUNTRY_CHOICE,
                'country_display_type' => 'display_country_full',
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group mb-3',
                ],
                'attr' => [
                    'placeholder' => $this->translator->trans('Enter Phone', [], 'users'),
                ],
            ])
            ->add('gravatar', EmailType::class, [
                'label' => 'Gravatar',
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group mb-3',
                ],
                'attr' => [
                    'placeholder' => $this->translator->trans('Enter Gravatar', [], 'users'),
                ],
            ])
            ->add('address', TextareaType::class, [
                'label' => $this->translator->trans('Address', [], 'users'),
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group mb-3',
                ],
                'attr' => [
                    'placeholder' => $this->translator->trans('Enter Address', [], 'users'),
                    'rows' => '2',
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
