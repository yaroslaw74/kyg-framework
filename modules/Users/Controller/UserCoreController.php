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
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Target;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Workflow\WorkflowInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

final class UserCoreController extends AbstractController
{
    public function __construct(
        private PaginatorInterface $paginator,
        private EntityManagerInterface $entityManager,
        private TranslatorInterface $translator,
        #[Target('user_status')]
        private WorkflowInterface $workflow,
    ) {
    }

    #[Route('/app/user/list/{page}', name: 'app_user_list')]
    public function userList(Request $request, int $page = 1): Response
    {
        $repository = $this->entityManager->getRepository(User::class);
        $users = $repository->findAll();
        $pagination = $this->paginator->paginate($users, $request->query->getInt('page', $page));

        return $this->render('@Users/core/userlist.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    #[Route('/app/user/add', name: 'app_user_add')]
    public function userAdd(Request $request, UserPasswordHasherInterface $userPasswordHasher): Response|RedirectResponse
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

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            $this->addFlash('success', $this->translator->trans('The user has been added.', [], 'users'));

            $referer = $request->headers->get('referer');

            $this->redirect($referer ?? $this->generateUrl('app'));
        }

        return $this->render('@Users/core/add_user.html.twig', [
            'userAddForm' => $form,
        ]);
    }

    #[Route('/app/user/profile', name: 'app_user_profile')]
    public function userProfile(): Response
    {
        return $this->render('@Users/core/profile.html.twig', []);
    }

    #[Route('/app/user/editprofile', name: 'app_user_editprofile')]
    public function userEditProfile(): Response
    {
        return $this->render('@Users/core/editprofile.html.twig', []);
    }

    #[Route('/app/user/settings', name: 'app_user_settings')]
    public function userSettings(): Response
    {
        return $this->render('@Users/core/settings.html.twig', []);
    }
}
