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
                    'label' => 'Email',
                    'row_attr' => ['class' => 'form-group mb-3'],
                    'attr' => [
                        'autocomplete' => 'email',
                        'placeholder' => $this->translator->trans('Enter your Email', [], 'users')
                    ],
                    'constraints' => [
                        new NotBlank([
                            'message' => $this->translator->trans('Please enter your email', [], 'users')
                        ])
                    ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
