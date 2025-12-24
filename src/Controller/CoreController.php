<?php
/**********************************************************************************
 * @Project    KYG Framework for Business
 * @Version    1.0.0
 *
 * @Copyright  (C) Kataev Yaroslav
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later, see LICENSE
 *********************************************************************************/
declare(strict_types=1);
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Attribute\Route;

final class CoreController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): RedirectResponse
    {
        return $this->redirectToRoute('kyg');
    }
}
