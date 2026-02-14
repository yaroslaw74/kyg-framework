<?php

/**
 * KYG Framework for Business.
 *
 * @category   Twig Extension
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Administration\Twig;

use Twig\Extension\AbstractExtension;
use Twig\Extension\ExtensionInterface;
use Twig\TwigFunction;
use App\Modules\Administration\Service\FileManagerServise;
use Twig\Extension\GlobalsInterface;

class FileManagerTwigExtension extends AbstractExtension implements ExtensionInterface, GlobalsInterface
{
    public function __construct(private FileManagerServise $fileManagerService)
    {
    }

    public function sizeDirExtension(string $path): string
    {
        return $this->fileManagerService->getDirSize($path);
    }

    public function breadcrumbPathExtension(string $path): array
    {
        return $this->fileManagerService->getBreadcrumbPath($path);
    }

    /**
     * @return TwigFunction[]
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('size_dir', [$this, 'sizeDirExtension']),
            new TwigFunction('breadcrumb_path', [$this, 'breadcrumbPathExtension'])
        ];
    }

    /**
     * @return array<string, string>
     */
    public function getGlobals(): array
    {
        return [
            'storage_dir' => $this->fileManagerService->getStoragePath(),
            'storage_free_space' => $this->fileManagerService->formatBytes($this->fileManagerService->getFreeSpaseStorage()),
            'storage_size_percent' => $this->fileManagerService->getDirSizePercent($this->fileManagerService->getStoragePath())
        ];
    }
}
