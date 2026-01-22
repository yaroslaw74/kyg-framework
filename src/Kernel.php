<?php

/**
 * KYG Framework for Business.
 *
 * @category   Kernel
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

final class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    private function getModulesDir(): string
    {
        return $this->getProjectDir().'/modules';
    }

    private function getAdditionssDir(): string
    {
        return $this->getProjectDir().'/public/additions';
    }

    /**
     * Summary of configureRoutes.
     *
     * @phpstan-ignore method.unused
     */
    private function configureRoutes(RoutingConfigurator $routes): void
    {
        $configDir = $this->getConfigDir();

        $routes->import($configDir.'/{routes}/'.$this->environment.'/*.{php,yaml}');
        $routes->import($configDir.'/{routes}/*.{php,yaml}');

        if (is_file($configDir.'/routes.yaml')) {
            $routes->import($configDir.'/routes.yaml');
        } else {
            $routes->import($configDir.'/{routes}.php');
        }

        $modulesDir = $this->getModulesDir();
        $modules = array_diff(scandir($modulesDir), ['..', '.']);
        foreach ($modules as $name) {
            if (!is_file($modulesDir.'/'.$name)) {
                $routes->import($modulesDir.'/'.$name.'/Resources/config/{routes}/*.{php,yaml,xml}');
            }
        }

        $additionsDir = $this->getAdditionssDir();
        $additions = array_diff(scandir($additionsDir), ['..', '.']);
        foreach ($additions as $name) {
            if (!is_file($additionsDir.'/'.$name)) {
                $routes->import($additionsDir.'/'.$name.'/Resources/config/{routes}/*.{php,yaml,xml}');
            }
        }

        if (false !== ($fileName = (new \ReflectionObject($this))->getFileName())) {
            $routes->import($fileName, 'attribute');
        }
    }
}
