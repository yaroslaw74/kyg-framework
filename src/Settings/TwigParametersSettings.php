<?php

/**
 * KYG Framework for Business.
 *
 * @category   Settings
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Settings;

use Jbtronics\SettingsBundle\ParameterTypes\IntType;
use Jbtronics\SettingsBundle\ParameterTypes\StringType;
use Jbtronics\SettingsBundle\Settings\Settings;
use Jbtronics\SettingsBundle\Settings\SettingsParameter;
use Jbtronics\SettingsBundle\Settings\SettingsTrait;
use Jbtronics\SettingsBundle\Storage\PHPFileStorageAdapter;

#[Settings(name: 'twig_param', dependencyInjectable: true, storageAdapter: PHPFileStorageAdapter::class, storageAdapterOptions: ['filename' => 'TwigParametersSettings.php'])]
class TwigParametersSettings
{
    use SettingsTrait;

    #[SettingsParameter(type: StringType::class)]
    private ?string $dateFormat = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $timeFormat = null;

    #[SettingsParameter(type: StringType::class)]
    private ?string $separatorDateTime = null;

    #[SettingsParameter(type: StringType::class)]
    private string $formatDateTime = 'F j, Y H:i';

    #[SettingsParameter(type: IntType::class)]
    private int $numberFormatDecimals = 0;

    #[SettingsParameter(type: StringType::class)]
    private string $numberFormatDecimalPoint = '.';

    #[SettingsParameter(type: StringType::class)]
    private string $numberFormatThousandsSeparator = ',';

    public function getDateFormat(): ?string
    {
        return $this->dateFormat;
    }

    public function setDateFormat(string $dateFormat): void
    {
        $this->dateFormat = $dateFormat;
    }

    public function getTimeFormat(): ?string
    {
        return $this->timeFormat;
    }

    public function setTimeFormat(string $timeFormat): void
    {
        $this->timeFormat = $timeFormat;
    }

    public function getSeparatorDateTime(): ?string
    {
        return $this->separatorDateTime;
    }

    public function setSeparatorDateTime(string $separatorDateTime): void
    {
        $this->separatorDateTime = $separatorDateTime;
    }

    public function getFormatDateTime(): string
    {
        return $this->formatDateTime;
    }

    public function setFormatDateTime(string $formatDateTime): void
    {
        $this->formatDateTime = $formatDateTime;
    }

    public function getNumberFormatDecimals(): int
    {
        return $this->numberFormatDecimals;
    }

    public function setNumberFormatDecimals(int $numberFormatDecimals): void
    {
        $this->numberFormatDecimals = $numberFormatDecimals;
    }

    public function getNumberFormatDecimalPoint(): string
    {
        return $this->numberFormatDecimalPoint;
    }

    public function setNumberFormatDecimalPoint(string $numberFormatDecimalPoint): void
    {
        $this->numberFormatDecimalPoint = $numberFormatDecimalPoint;
    }

    public function getNumberFormatThousandsSeparator(): string
    {
        return $this->numberFormatThousandsSeparator;
    }

    public function setNumberFormatThousandsSeparator(string $numberFormatThousandsSeparator): void
    {
        $this->numberFormatThousandsSeparator = $numberFormatThousandsSeparator;
    }
}
