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
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * class CoreController.
 */
final class CoreController extends AbstractController
{
    public function __construct(
        private PaginatorInterface $paginator,
        private EntityManagerInterface $entityManager,
    ) {
    }

    #[Route('/app/user/list/{page}', name: 'app_user_list')]
    public function userList(Request $request, EntityManagerInterface $entityManager, PaginatorInterface $paginator, int $page = 1): Response
    {
        $repository = $this->entityManager->getRepository(User::class);
        $users = $repository->findAll();
        $pagination = $this->paginator->paginate($users, $request->query->getInt('page', $page));

        return $this->render('@Users/core/userlist.html.twig', [
            'pagination' => $pagination,
        ]);
    }
}
