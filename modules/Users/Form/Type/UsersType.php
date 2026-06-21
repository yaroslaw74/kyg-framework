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
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username')
            ->add('email')
            ->add('password')
            ->add('firstName')
            ->add('lastName')
            ->add('middleName')
            ->add('locale')
            ->add('facebook')
            ->add('yandex')
            ->add('google')
            ->add('linkedin')
            ->add('mailru')
            ->add('odnoklassniki')
            ->add('xTwitter')
            ->add('vkontakte')
            ->add('github')
            ->add('amazon')
            ->add('instagram')
            ->add('twitch')
            ->add('yahoo')
            ->add('spotify')
            ->add('trello')
            ->add('dropbox')
            ->add('flickr')
            ->add('windowsLive')
            ->add('gravatar')
            ->add('avatar')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
