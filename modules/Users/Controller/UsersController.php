<?php

/**
 * KYG Framework for Business.
 *
 * @category   Controller
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Users\Controller;

use App\Modules\Users\Form\Type\UsersType;
use App\Modules\Users\Form\Type\ProfileFormType;
use App\Modules\Users\Entity\Users;
use App\Modules\Users\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Modules\Users\Form\Type\SetAvatarUserFormType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class UsersController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private UsersRepository $usersRepository,
        private UserPasswordHasherInterface $userPasswordHasher
    ) {
    }

    #[Route('/app/user/list', name: 'app_user_list', methods: ['GET'])]
    public function index(Request $request): Response
    {
        return $this->render('app/modules/users/entity/users/index.html.twig', [
            'users' => $this->usersRepository->findAll(),
        ]);
    }

    #[Route('/app/user/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $user = new Users();
        $form = $this->createForm(UsersType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($user);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_user', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('app/modules/users/entity/users/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/app/user/show/{id}', name: 'app_user_show', methods: ['GET', 'POST'])]
    public function show(Request $request, ?int $id = null): Response
    {
        /** @var Users $user */
        $user = ($id === null) ? $this->getUser() : $this->usersRepository->find($id);

        $form_avatar = $this->createForm(SetAvatarUserFormType::class, $user);
        $form_avatar->handleRequest($request);

        $form_profile = $this->createForm(ProfileFormType::class, $user);
        $form_profile->handleRequest($request);

        if ($form_avatar->isSubmitted() && $form_avatar->isValid()) {
            /** @var string $avatar */
            $avatar = $form_avatar->get('avatar')->getData();

            if ('' !== $avatar) {
                $user->setAvatar($avatar);
            }

            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }

        if ($form_profile->isSubmitted() && $form_profile->isValid()) {
            $username = $form_profile->get('username')->getData();
            $lastName = $form_profile->get('last_name')->getData();
            $firstName = $form_profile->get('first_name')->getData();
            $middleName = $form_profile->get('middleName')->getData();
            $email = $form_profile->get('email')->getData();
            $plainPassword = $form_profile->get('plainPassword')->getData();
            $about = $form_profile->get('about')->getData();

            if ('' !== $username) {
                $user->setUsername($username);
            }

            if ('' !== $lastName) {
                $user->setLastName($lastName);
            }

            if ('' !== $firstName) {
                $user->setFirstName($firstName);
            }

            if ('' !== $middleName) {
                $user->setMiddleName($middleName);
            }

            if ('' !== $email) {
                $user->setEmail($email);
            }

            if ('' !== $plainPassword) {
                $user->setPassword($this->userPasswordHasher->hashPassword($user, $plainPassword));
            }

            if ('' !== $about) {
                $user->setAbout($about);
            }

            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }

        $getUser = null;

        if ($id !== null) {
            $getUser = $this->usersRepository->find($id);
        }

        return $this->render('@Users/core/profile.html.twig', [
            'setAvatarUserForm' => $form_avatar,
            'profileForm' => $form_profile,
            'user' => $getUser,
        ]);
    }

    #[Route('/app/user/edit/{id}', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ?int $id = null): Response
    {
        /** @var Users $user */
        $user = ($id === null) ? $this->getUser() : $this->usersRepository->find($id);

        $form = $this->createForm(UsersType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('app_user', [], Response::HTTP_SEE_OTHER);
        }

        $getUser = null;

        if ($id !== null) {
            $getUser = $this->usersRepository->find($id);
        }

        return $this->render('app/modules/users/entity/users/edit.html.twig', [
            'user' => $getUser,
            'form' => $form,
        ]);
    }

    #[Route('/app/user/delete/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, Users $user): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->getPayload()->getString('_token'))) {
            $this->entityManager->remove($user);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('app_user', [], Response::HTTP_SEE_OTHER);
    }
}
