<?php

/**
 * KYG Framework for Business.
 *
 * @category   Command
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Config\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpKernel\KernelInterface;

#[AsCommand(name: 'kygbundle:install')]
class KYGBundleInstallCommand extends Command
{
    public const string METHOD_COPY = 'copy';
    public const string METHOD_ABSOLUTE_SYMLINK = 'absolute symlink';
    public const string METHOD_RELATIVE_SYMLINK = 'relative symlink';

    public function __construct(private Filesystem $filesystem)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addOption('symlink', null, InputOption::VALUE_NONE, 'Symlink the assets instead of copying them')
            ->addOption('relative', null, InputOption::VALUE_NONE, 'Make relative symlinks')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /**
         * @var KernelInterface $kernel
         *
         * @phpstan-ignore method.notFound
         */
        $kernel = $this->getApplication()->getKernel();
        $projectDir = $kernel->getProjectDir();
        $bundlesDir = "{$projectDir}/public/bundles";
        $originDir = "{$projectDir}/modules/Config/Resources/data/public";
        $targetDir = "{$bundlesDir}/KYG-Framework";
        $exitCode = 0;

        if (!is_dir($bundlesDir)) {
            $this->filesystem->mkdir($bundlesDir, 0o777);
        }

        $expectedMethod = null;

        if ($input->getOption('relative')) {
            $expectedMethod = self::METHOD_RELATIVE_SYMLINK;
        } elseif ($input->getOption('symlink')) {
            $expectedMethod = self::METHOD_ABSOLUTE_SYMLINK;
        } else {
            $expectedMethod = self::METHOD_COPY;
        }

        if (is_dir($originDir)) {
            try {
                $this->filesystem->remove($targetDir);

                if (self::METHOD_RELATIVE_SYMLINK === $expectedMethod) {
                    $this->relativeSymlinkWithFallback($originDir, $targetDir);
                } elseif (self::METHOD_ABSOLUTE_SYMLINK === $expectedMethod) {
                    $this->absoluteSymlinkWithFallback($originDir, $targetDir);
                } else {
                    $this->hardCopy($originDir, $targetDir);
                }
            } catch (\Exception $e) {
                $exitCode = 1;
            }
        } else {
            $exitCode = 2;
        }

        return $exitCode;
    }

    private function symlink(string $originDir, string $targetDir, bool $relative = false): void
    {
        if ($relative) {
            $this->filesystem->mkdir(\dirname($targetDir));
            $originDir = $this->filesystem->makePathRelative($originDir, realpath(\dirname($targetDir)));
        }
        $this->filesystem->symlink($originDir, $targetDir);
        if (!file_exists($targetDir)) {
            throw new IOException(\sprintf('Symbolic link "%s" was created but appears to be broken.', $targetDir), 0, null, $targetDir);
        }
    }

    private function relativeSymlinkWithFallback(string $originDir, string $targetDir): void
    {
        try {
            $this->symlink($originDir, $targetDir, true);
        } catch (IOException) {
            $this->absoluteSymlinkWithFallback($originDir, $targetDir);
        }
    }

    private function absoluteSymlinkWithFallback(string $originDir, string $targetDir): void
    {
        try {
            $this->symlink($originDir, $targetDir);
        } catch (IOException) {
            // fall back to copy
            $this->hardCopy($originDir, $targetDir);
        }
    }

    private function hardCopy(string $originDir, string $targetDir): void
    {
        $this->filesystem->mkdir($targetDir, 0o777);
        // We use a custom iterator to ignore VCS files
        $this->filesystem->mirror($originDir, $targetDir, Finder::create()->ignoreDotFiles(false)->in($originDir));
    }
}
