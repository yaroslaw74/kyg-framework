<?php

/**
 * KYG Framework for Business.
 *
 * @category   Service
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\System\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class FileManagerServise
{
    public function __construct(private ContainerBagInterface $params)
    {
    }

    public function getStoragePath(): string
    {
        return $this->params->get('kernel.project_dir').'/public/storage';
    }

    /**
     * @return array<int, array{name: string, size: string,logo: string, system: bool, file: bool, path: string|null}>
     */
    public function getStorageList(): array
    {
        $pathDir = $this->getStoragePath();
        $dirScan = array_diff(scandir($pathDir), ['.', '..']);
        $listDir = [];
        foreach ($dirScan as $name) {
            $path = "{$pathDir}/{$name}";
            if (is_dir($path)) {
                \in_array($name, ['Images', 'Videos', 'Documents', 'Music', 'Downloads', 'Other'], true) ?
                    $listDir[] = [
                        'name' => $name,
                        'size' => $this->getDirSize($path),
                        'logo' => "{$name}.png",
                        'path' => null,
                        'system' => true,
                        'file' => false,
                    ]
                    :
                    $listDir[] = [
                        'name' => $name,
                        'size' => $this->getDirSize($path),
                        'logo' => 'Folder.png',
                        'path' => null,
                        'system' => false,
                        'file' => false,
                    ];
            } else {
                $listDir[] = [
                    'name' => $name,
                    'size' => $this->formatBytes(filesize($path)),
                    'logo' => $this->getFileIcon($path),
                    'path' => null,
                    'system' => false,
                    'file' => true,
                ];
            }
        }

        return $listDir;
    }

    /**
     * @return array<int, array{name: string, size: string,logo: string, system: bool, file: bool, path: string|null}>
     */
    public function getFoldersList(string $dir, ?string $pathDir = null): array
    {
        $dirScan = array_diff(scandir($dir), ['.', '..']);
        $listDir = [];
        foreach ($dirScan as $name) {
            $path = "{$dir}/{$name}";
            is_dir($path) ?
                $listDir[] = [
                    'name' => $name,
                    'size' => $this->getDirSize($path),
                    'logo' => 'Folder.png',
                    'path' => $pathDir,
                    'system' => false,
                    'file' => false,
                ]
                :
                $listDir[] = [
                    'name' => $name,
                    'size' => $this->formatBytes(filesize($path)),
                    'logo' => $this->getFileIcon($path),
                    'path' => $pathDir,
                    'system' => false,
                    'file' => true,
                ];
        }

        return $listDir;
    }

    public function getFileIcon(string $file): string
    {
        $extension = $this->getFileExtension($file);

        if (\in_array($extension, ['ai', 'avi', 'bmp', 'cab', 'doc', 'fla', 'gif', 'html', 'ip', 'jpeg', 'midi', 'pdf', 'png', 'ppt', 'psd', 'rar', 'rtf', 'tiff', 'txt', 'wav', 'wma', 'xls', 'zip'], true)) {
            return "{$extension}.png";
        }

        if (\in_array($extension, ['mp3', 'aif', 'aiff', 'ogg', 'xm', 'mod', 'it', 's3m'], true)) {
            return 'SoundClip.png';
        }

        if (\in_array($extension, ['chm', 'hlp', 'htb', 'hht', 'gid'], true)) {
            return 'Help.png';
        }

        if ('docx' === $extension) {
            return 'doc.png';
        }

        if ('xlsx' === $extension) {
            return 'xls.png';
        }

        if ('pptx' === $extension) {
            return 'ppt.png';
        }

        $mime = mime_content_type($file);

        if (str_starts_with($mime, 'image/')) {
            return 'Picture.png';
        }

        if (str_starts_with($mime, 'text/')) {
            return 'Document.png';
        }

        if (str_starts_with($mime, 'video/')) {
            return 'VideoClips.png';
        }

        if (str_starts_with($mime, 'audio/')) {
            return 'Sounds.png';
        }

        return 'Default.png';
    }

    public function getFileExtension(string $file): string
    {
        return strtolower(pathinfo($file, PATHINFO_EXTENSION));
    }

    public function getDirSizeFloat(string $dir): float
    {
        $size = 0;
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($dir, \RecursiveDirectoryIterator::SKIP_DOTS)
        );

        foreach ($files as $file) {
            $size += $file->getSize();
        }

        return $size;
    }

    public function getDirSize(string $dir): string
    {
        return $this->formatBytes($this->getDirSizeFloat($dir));
    }

    public function formatBytes(float $byte, int $precision = 2): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = max($byte, 0);
        if (0 === (int) $bytes) {
            return '0 B';
        }
        $pow = floor(log($bytes) / log(1024));
        $pow = min($pow, \count($units) - 1);
        $bytes /= pow(1024, $pow);

        return round($bytes, $precision).' '.$units[$pow];
    }

    public function getFreeSpaseStorage(): float
    {
        return disk_free_space($this->getStoragePath());
    }

    public function getDirSizePercent(string $dir): string
    {
        $size = $this->getDirSizeFloat($dir);
        $freeSpace = $this->getFreeSpaseStorage();
        $sizePercent = round($size / ($size + $freeSpace) * 100);

        return "{$sizePercent}%";
    }

    /**
     * @return list<array<string, string>>
     */
    public function getBreadcrumbPath(string $path): array
    {
        $parts = explode('/', $path);
        $breadcrumb = [];
        $currentPath = '';
        foreach ($parts as $part) {
            if ('' === $part) {
                continue;
            }
            $breadcrumb[] = [
                'name' => $part,
                'path' => $currentPath,
            ];

            $currentPath .= '/';
        }

        return $breadcrumb;
    }
}
