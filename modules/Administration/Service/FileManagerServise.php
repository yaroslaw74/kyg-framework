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

namespace App\Modules\Administration\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class FileManagerServise
{
    public function __construct(private ContainerBagInterface $params)
    {
    }

    public function getStoragePath(): string
    {
        return $this->params->get('kernel.project_dir') . '/public/storage';
    }

    /**
     * @return array<int, array{name: string, size: string,logo: string, system: bool, file: bool}>
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
                        'system' => true,
                        'file' => false
                    ]
                    :
                    $listDir[] = [
                        'name' => $name,
                        'size' => $this->getDirSize($path),
                        'logo' => 'Blank.png',
                        'system' => false,
                        'file' => false
                    ];

            } else {
                $listDir[] = [
                    'name' => $name,
                    'size' => $this->formatBytes(filesize($path)),
                    'logo' => 'File.png',
                    'system' => false,
                    'file' => true
                ];
            }
        }

        return $listDir;
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

    function formatBytes(float $byte, int $precision = 2): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = max($byte, 0);
        if ((int) $bytes === 0) {
            return '0 B';
        }
        $pow = floor(log($bytes) / log(1024));
        $pow = min($pow, \count($units) - 1);
        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
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
}
