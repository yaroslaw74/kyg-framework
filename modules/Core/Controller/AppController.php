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

namespace App\Modules\Core\Controller;

use SpomkyLabs\PwaBundle\Attribute\Screenshot;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * @see \App\Tests\Controller\AppControllerTest
 */
final class AppController extends AbstractController
{
    #[Route('/app', name: 'app', methods: ['GET'])]
    public function index(): RedirectResponse
    {
        return $this->redirectToRoute('app_home');
    }

    #[Route('/app/home', name: 'app_home', methods: ['GET'])]
    #[Screenshot(
        sizes: ['hd', 'fhd', 'ipad/LP', 'iphone-14', 'desktop-lg', 'galaxy-s21', 'mobile-lg'],
        name: 'homepage',
        label: 'Application homepage',
    )]
    public function home(): Response
    {
        return $this->render('@Core/app/home.html.twig', []);
    }
}
