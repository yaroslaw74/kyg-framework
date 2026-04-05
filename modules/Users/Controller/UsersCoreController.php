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

use App\Modules\Users\Entity\User;
use App\Modules\Users\Form\Type\AddUserFormType;
use App\Modules\Users\Form\Type\ProfileFormType;
use App\Modules\Users\Form\Type\SetAvatarUserForm;
use App\Modules\Users\Form\Type\UserLanguageFormType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Pyrrah\GravatarBundle\Templating\Helper\GravatarHelperInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Target;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Workflow\WorkflowInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

final class UsersCoreController extends AbstractController
{
    public function __construct(
        private PaginatorInterface $paginator,
        private EntityManagerInterface $entityManager,
        private TranslatorInterface $translator,
        #[Target('user_status')]
        private WorkflowInterface $workflow,
    ) {
    }

    #[Route('/app/user/list/{page}', name: 'app_user_list', methods: ['GET', 'POST'])]
    public function index(Request $request, int $page = 1): Response
    {
        $this->entityManager->getFilters()->disable('softdeleteable');
        $repository = $this->entityManager->getRepository(User::class);
        $users = $repository->findAll();
        $pagination = $this->paginator->paginate($users, $request->query->getInt('page', $page));

        return $this->render('@Users/core/userlist.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    #[Route('/app/user/add', name: 'app_user_add', methods: ['GET', 'POST'])]
    public function new(Request $request, UserPasswordHasherInterface $userPasswordHasher): Response|RedirectResponse
    {
        $user = new User();
        $form = $this->createForm(AddUserFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var string $plainPassword */
            $plainPassword = $form->get('plainPassword')->getData();

            if ('' !== $plainPassword) {
                // encode the plain password
                $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));
                $this->workflow->apply($user, 'pending');
            }

            $user->setCreatedAt(new \DateTime());
            $user->setCreatedBy((string) $this->getUser());

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            $this->addFlash('success', $this->translator->trans('The user has been added.', [], 'users'));

            $referer = $request->headers->get('referer');

            return $this->redirect($referer ?? $this->generateUrl('app'));
        }

        return $this->render('@Users/core/add_user.html.twig', [
            'userAddForm' => $form,
        ]);
    }

    #[Route('/app/user/profile/{id}', name: 'app_user_profile', methods: ['GET', 'POST'])]
    public function show(Request $request, ?int $id = null): Response
    {
        $user = new User();
        $form = $this->createForm(SetAvatarUserForm::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var string $avatar */
            $avatar = $form->get('avatar')->getData();

            if ('' !== $avatar) {
                $user->setAvatar($avatar);
            }

            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }

        if (null === $id) {
            $getUser = null;
        } else {
            $this->entityManager->getFilters()->disable('softdeleteable');
            $repository = $this->entityManager->getRepository(User::class);
            $getUser = $repository->find($id);
        }

        return $this->render('@Users/core/profile.html.twig', [
            'SetAvatarUserForm' => $form,
            'user' => $getUser,
        ]);
    }

    #[Route('/app/user/editprofile/{id}', name: 'app_user_editprofile', methods: ['GET', 'POST'])]
    public function edit(Request $request, GravatarHelperInterface $helper, ?int $id = null): Response
    {
        $user = new User();
        $formAvatar = $this->createForm(SetAvatarUserForm::class, $user);
        $formAvatar->handleRequest($request);

        if ($formAvatar->isSubmitted() && $formAvatar->isValid()) {
            /** @var string $avatar */
            $avatar = $formAvatar->get('avatar')->getData();
            if ('' !== $avatar) {
                $user->setAvatar($avatar);
            }

            $user->setUpdatedAt(new \DateTime());
            $user->setUpdatedBy((string) $this->getUser());

            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }

        $formProfile = $this->createForm(ProfileFormType::class, $user);
        $formProfile->handleRequest($request);

        if ($formProfile->isSubmitted() && $formProfile->isValid()) {
            /** @var string $username */
            $username = $formProfile->get('username')->getData();
            if ('' !== $username) {
                $user->setUsername($username);
            }

            $middleName = $formProfile->get('middleName')->getData();
            /** @var string $middleName */
            if ('' !== $middleName) {
                $user->setMiddleName($middleName);
            }

            $firstName = $formProfile->get('firstName')->getData();
            /** @var string $firstName */
            if ('' !== $firstName) {
                $user->setFirstName($firstName);
            }

            $lastName = $formProfile->get('lastName')->getData();
            /** @var string $lastName */
            if ('' !== $lastName) {
                $user->setLastName($lastName);
            }

            $email = $formProfile->get('email')->getData();
            /** @var string $email */
            if ('' !== $email) {
                $user->setEmail($email);
            }

            $mobile = $formProfile->get('mobile')->getData();
            /** @var string $mobile */
            if ('' !== $mobile) {
                $user->setMobile($mobile);
            }

            $gravatar = $formProfile->get('gravatar')->getData();
            /* @var string $mobile */
            if ('' !== $gravatar) {
                if ($helper->exists($gravatar)) {
                    $user->setGravatar($gravatar);
                } else {
                    $this->addFlash('error', $this->translator->trans('Gravatar not found', [], 'users'));
                }
            }

            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }

        if (null === $id) {
            $getUser = null;
        } else {
            $this->entityManager->getFilters()->disable('softdeleteable');
            $repository = $this->entityManager->getRepository(User::class);
            $getUser = $repository->find($id);
        }

        return $this->render('@Users/core/editprofile.html.twig', [
            'SetAvatarUserForm' => $formAvatar,
            'ProfileForm' => $formProfile,
            'user' => $getUser,
        ]);
    }

    #[Route('/app/user/delite/{id}', name: 'app_user_delite', methods: ['GET'])]
    public function delete(Request $request, ?int $id = null): RedirectResponse
    {
        if (null !== $id) {
            $this->entityManager->getFilters()->disable('softdeleteable');
            $repository = $this->entityManager->getRepository(User::class);
            $users = $repository->find($id);
            $this->entityManager->remove($users);
            $this->entityManager->flush();

            $this->addFlash('success', $this->translator->trans('The user has been deleted.', [], 'users'));
        }

        $referer = $request->headers->get('referer');

        return $this->redirect($referer ?? $this->generateUrl('app'));
    }

    #[Route('/app/user/settings', name: 'app_user_settings', methods: ['POST'])]
    public function settings(Request $request): Response
    {
        $user = new User();
        $formLanguage = $this->createForm(UserLanguageFormType::class, $user);
        $formLanguage->handleRequest($request);

        if ($formLanguage->isSubmitted() && $formLanguage->isValid()) {
            /** @var string $locale */
            $locale = $formLanguage->get('locale')->getData();
            if ('' !== $locale) {
                $user->setLocale($locale);
            }

            /** @var string $timezone */
            $timezone = $formLanguage->get('timezone')->getData();
            if ('' !== $timezone) {
                $user->setTimezone($timezone);
            }

            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }

        return $this->render('@Users/core/settings.html.twig', [
            'LangugeForm' => $formLanguage,
        ]);
    }

    #[Route('/app/user/friend/delite/{id}/{friend_id}', name: 'app_user_friend_delite', methods: ['GET'])]
    public function friendsDelite(Request $request, ?int $id = null, ?int $friend_id = null): RedirectResponse
    {
        if (null !== $id and null !== $friend_id) {
            $repository = $this->entityManager->getRepository(User::class);
            $user = $repository->find($id);
            $friend = $repository->find($friend_id);
            $user->removeFriend($friend);

            $this->entityManager->persist($user);
            $this->entityManager->persist($friend);
            $this->entityManager->flush();

            $this->addFlash('success', $this->translator->trans('The friend has been deleted.', [], 'users'));
        }

        $referer = $request->headers->get('referer');

        return $this->redirect($referer ?? $this->generateUrl('app'));
    }
}
