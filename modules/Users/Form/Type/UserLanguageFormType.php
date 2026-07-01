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

use App\Modules\Users\Entity\Users;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TimezoneType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @template-extends AbstractType<Users>
 */
class UserLanguageFormType extends AbstractType
{
    public function __construct(
        private readonly TranslatorInterface $translator,
        private readonly ContainerBagInterface $params,
        private readonly Security $security,
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $locales = $this->params->get('app.locales');
        $lang = $this->params->get('kernel.enabled_locales');
        $user = $this->security->getUser();
        if ($user instanceof Users) {
            $lang_user = $user->getLocale();
            if (null !== $lang_user) {
                $lang_user = $this->translator->getLocale();
            }

            $timezone_user = $user->getTimezone();
            if (null !== $timezone_user) {
                $timezone_user = date_default_timezone_get();
            }
        } else {
            $lang_user = $this->translator->getLocale();
            $timezone_user = date_default_timezone_get();
        }

        $locale_choices = [];
        $locale_attr = [];
        foreach ($locales as $key => $value) {
            if (\in_array($key, $lang, true)) {
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
                'data' => $lang_user,
            ])
            ->add('timezone', TimezoneType::class, [
                'label' => $this->translator->trans('Timezone', [], 'users'),
                'required' => false,
                'attr' => [
                    'dir' => 'en',
                ],
                'placeholder' => false,
                'data' => $timezone_user,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
