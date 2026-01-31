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

namespace App\DependencyInjection;

use App\Settings\TwigParametersSettings;
use Jbtronics\SettingsBundle\Manager\SettingsManagerInterface;
use Symfony\Component\DependencyInjection\EnvVarLoaderInterface;

final class TwigParamVar implements EnvVarLoaderInterface
{
    public function __construct(private SettingsManagerInterface $settingsManager)
    {
    }

    /**
     * @return array<string, int|string>
     *
     * @phpstan-ignore method.childReturnType
     */
    public function loadEnvVars(): array
    {
        $settings = $this->settingsManager->get(TwigParametersSettings::class);
        $param = [
            'ENV_DATE_FORMAT' => $settings->getFormatDateTime(),
            'ENV_DECIMALS' => $settings->getNumberFormatDecimals(),
            'ENV_DECIMAL_POINT' => $settings->getNumberFormatDecimalPoint(),
            'ENV_THOUSANDS_SEPARATOR' => $settings->getNumberFormatThousandsSeparator(),
        ];

        return $param;
    }
}
