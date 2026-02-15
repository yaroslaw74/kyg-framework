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
                'row_attr' => ['class' => 'form-group mb-3'],
            ])
            ->add('middleName', TextType::class, [
                'label' => $this->translator->trans('Middle Name', [], 'users'),
                'required' => false,
                'row_attr' => ['class' => 'form-group mb-3'],
            ])
            ->add('firstName', TextType::class, [
                'label' => $this->translator->trans('First Name', [], 'users'),
                'required' => false,
                'row_attr' => ['class' => 'form-group mb-3'],
            ])
            ->add('email', EmailType::class, [
                'label' => $this->translator->trans('Email', [], 'users'),
                'row_attr' => ['class' => 'form-group mb-3'],
                'attr' => ['autocomplete' => 'email'],
                'constraints' => [
                    new NotBlank([
                        'message' => $this->translator->trans('Please enter email', [], 'users'),
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => $this->translator->trans('Password', [], 'users'),
                'row_attr' => ['class' => 'form-group mb-3'],
                'required' => false,
                'toggle' => true,
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
            ]);

        $settings = $this->settingsManager->get(NameSettings::class);

        if ($settings->getLastNameEnable()) {
            $builder->add('lastName', TextType::class, [
                'label' => $this->translator->trans('Last Name', [], 'users'),
                'required' => false,
                'row_attr' => ['class' => 'form-group mb-3'],
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
