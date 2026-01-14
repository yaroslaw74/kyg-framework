<?php

/**
 * KYG Framework for Business.
 *
 * @category   Security
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Users\Security;

use App\Modules\Users\Entity\User;
use HWI\Bundle\OAuthBundle\Form\RegistrationFormHandlerInterface;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final readonly class FormHandler implements RegistrationFormHandlerInterface
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher)
    {
    }

    public function process(Request $request, FormInterface $form, UserResponseInterface $userInformation): bool
    {
        $user = new User();
        $user->setEmail($userInformation->getEmail());
        $user->setUsername($userInformation->getNickname());

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $this->userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            return true;
        }

        return false;
    }
}
