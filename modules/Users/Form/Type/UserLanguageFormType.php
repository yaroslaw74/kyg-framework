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
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TimezoneType;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

/**
 * @template-extends AbstractType<User>
 */
class UserLanguageFormType extends AbstractType
{
    public function __construct(
        private TranslatorInterface $translator,
        private ContainerBagInterface $params
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $locales = $this->params->get('app.locales');
        $lang = $this->params->get('kernel.enabled_locales');

        $locale_choices = [];
        $locale_attr = [];
        foreach ($locales as $key => $value) {
            if (\in_array($key, $lang)) {
                $locale_choices[$value['name']] = $key;
                $locale_attr[$value['name']] = ['dir' => $value['dir']];
            }
        }

        $builder
            ->add('locale', ChoiceType::class, [
                'label' => $this->translator->trans('Locale', [], 'users'),
                'required' => false,
                'choices' => $locale_choices,
                'choice_attr' => $locale_attr,
                'choice_translation_domain' => false,
                'placeholder' => false,
                'data' => $this->translator->getLocale()
            ])
            ->add('timezone', TimezoneType::class, [
                'label' => $this->translator->trans('Timezone', [], 'users'),
                'required' => false,
                'attr' => [
                    'dir' => 'en'
                ],
                'placeholder' => false,
                'data' => date_default_timezone_get()
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }

}
