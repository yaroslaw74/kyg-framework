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

namespace App\Modules\Install\Command;

use App\Settings\DoctrineSettings;
use Jbtronics\SettingsBundle\Manager\SettingsManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'doctrine:configuration',
    description: 'Doctrine DBAL Configuration',
)]
final class DoctrineConfigurationCommand extends Command
{
    public function __construct(private readonly SettingsManagerInterface $settingsManager)
    {
        parent::__construct();
    }

    public function __invoke(SymfonyStyle $io): int
    {
        $settings = $this->settingsManager->get(DoctrineSettings::class);

        $io->newLine();

        $hostDB = $io->ask('Please enter the Host DB', '127.0.0.1');
        $portDB = $io->ask('Please enter the Port DB', '3306');
        $nameDB = $io->ask('Please enter the Name DB');
        $userDB = $io->ask('Please enter the User DB');
        $passDB = $io->ask('Please enter the Password DB');

        try {
            $dbh = new \PDO("mysql:host={$hostDB};dbname={$nameDB}", $userDB, $passDB);
        } catch (\PDOException) {
            $io->error('Database connection error!');

            return Command::FAILURE;
        }

        $serverVersion = $dbh->getAttribute(\PDO::ATTR_SERVER_VERSION);
        $dbalUrl = "mysql://{$userDB}:{$passDB}@{$hostDB}:{$portDB}/{$nameDB}?serverVersion={$serverVersion}&charset=utf8mb4";
        $settings->setDbalUrl($dbalUrl);
        $this->settingsManager->save($settings);

        $io->success('OK');

        return Command::SUCCESS;
    }
}
