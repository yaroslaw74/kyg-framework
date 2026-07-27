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

use App\Modules\Users\Entity\Users;
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

    /**
     * @param FormInterface<Users> $form
     *
     * @phpstan-ignore method.childParameterType
     */
    public function process(Request $request, FormInterface $form, UserResponseInterface $userInformation): bool
    {
        $users = new Users();
        $users->setEmail($userInformation->getEmail());
        $users->setUsername($userInformation->getNickname());
        $users->setFirstName($userInformation->getFirstName());
        $users->setLastName($userInformation->getLastName());

        $form->setData($users);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $users->setPassword(
                $this->userPasswordHasher->hashPassword(
                    $users,
                    $form->get('plainPassword')->getData()
                )
            );

            return true;
        }

        return false;
    }
}
