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

namespace App\Modules\System\Controller;

use App\Modules\System\Entity\Files;
use App\Modules\System\Service\FileManagerServise;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Rekalogika\Contracts\File\Metadata\ImageMetadataInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FileManagerController extends AbstractController
{
    public function __construct(
        private readonly FileManagerServise $fileManagerService,
        private PaginatorInterface $paginator,
        private EntityManagerInterface $entityManager,
    ) {
    }

    #[Route('/app/admin/file/manager', name: 'app_admin_file_manager')]
    public function fileManager(Request $request): Response
    {
        $listDir = $this->fileManagerService->getStorageList();

        $pagination = $this->paginator->paginate($listDir, $request->query->getInt('page', 1));

        return $this->render('@System/file_manager/file-manager.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    #[Route('/app/admin/file/manager/list/{list}', name: 'app_admin_file_manager_list')]
    public function fileManagerList(Request $request, ?string $list = null): Response
    {
        $dir = $this->fileManagerService->getStoragePath().'/'.$list;

        $listDir = $this->fileManagerService->getFoldersList($dir, $list);

        $pagination = $this->paginator->paginate($listDir, $request->query->getInt('page', 1));

        return $this->render('@System/file_manager/file-manager-list.html.twig', [
            'pagination' => $pagination,
            'list' => $list,
        ]);
    }

    #[Route('/app/admin/file/manager/detalis/{path}/{name}', name: 'app_admin_file_manager_detalis')]
    public function fileManagerDetails(Request $request, ?string $path = null, ?string $name = null): Response
    {
        $repository = $this->entityManager->getRepository(Files::class);
        $files = $repository->findBy(['path' => $path]);
        $id = null;
        if (null != $files) {
            foreach ($files as $value) {
                if ((string) $value->getName() === $name) {
                    $id = $value->getId();
                }
            }
        }
        if (null == $id) {
            return $this->render('@System/file_manager/file-manager-details.html.twig', [
                'file' => [
                    'path' => $path,
                    'name' => $name,
                    'size' => $this->fileManagerService->formatBytes(filesize($this->fileManagerService->getStoragePath().'/{$path}/{$name}')),
                    'createdAt' => '',
                    'createdBy' => '',
                    'updatedAt' => '',
                    'updatedBy' => '',
                    'width' => '',
                    'height' => '',
                    'format' => mime_content_type($this->fileManagerService->getStoragePath().'/{$path}/{$name}'),
                    'type' => finfo_file(finfo_open(FILEINFO_MIME_ENCODING), $this->fileManagerService->getStoragePath().'/{$path}/{$name}'),
                ],
            ]);
        }

        $file = $repository->find($id);

        return $this->render('@System/file_manager/file-manager-details.html.twig', [
            'file' => [
                'path' => $file->getPath(),
                'name' => (string) $file->getName(),
                'size' => $this->fileManagerService->formatBytes($file->getSize()),
                'createdAt' => $file->getCreatedAt(),
                'createdBy' => $file->getCreatedBy(),
                'updatedAt' => $file->getUpdatedAt(),
                'updatedBy' => $file->getUpdatedBy(),
                'width' => $file->get(ImageMetadataInterface::class)?->getWidth(),
                'height' => $file->get(ImageMetadataInterface::class)?->getHeight(),
                'format' => $file->getType()->getType(),
                'type' => $file->getType()->getName(),
            ],
        ]);
    }
}
