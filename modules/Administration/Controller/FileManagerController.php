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
namespace App\Modules\Administration\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Modules\Administration\Service\FileManagerServise;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

final class FileManagerController extends AbstractController
{
    public function __construct(
        private readonly FileManagerServise $fileManagerService,
        private PaginatorInterface $paginator,
    ) {
    }

    #[Route('/app/admin/file/manager', name: 'app_admin_file_manager')]
    public function fileManager(Request $request): Response
    {
        $listDir = $this->fileManagerService->getStorageList();

        $pagination = $this->paginator->paginate($listDir, $request->query->getInt('page', 1));

        return $this->render('@Administration/file_manager/file-manager.html.twig', [
            'pagination' => $pagination,
        ]);
    }
}
