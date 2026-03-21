<?php

/**
 * KYG Framework for Business.
 *
 * @category   Storage Adapter
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Config\Storage;

use App\Modules\Config\Entity\UsersSettings;
use App\Modules\Users\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Jbtronics\SettingsBundle\Storage\StorageAdapterInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * This class provides a storage adapter for the Doctrine ORM, it allows to store settings in the database using Doctrine ORM entities.
 * You will need to implement your own entity class that extends AbstractSettingsORMEntry and configure the storage adapter to use it.
 */
final class ORMUsersStorageAdapter implements StorageAdapterInterface
{
    /**
     * @var UsersSettings[][]
     *
     * @phpstan-var array<string, array<UsersSettings>>
     */
    private array $cache = [];

    private ?UserInterface $user = null;

    public function __construct(
        private Security $security,
        private EntityManagerInterface $entityManager,
    ) {
        // returns User object or null if not authenticated
        $this->user = $this->security->getUser();
    }

    private function getEntityObject(string $key): ?UsersSettings
    {
        // Check if we already have the entity in the cache
        if (isset($this->cache['UsersSettings'][$key])) {
            return $this->cache['UsersSettings'][$key];
        }

        if (null == $this->user) {
            return null;
        }

        // Retrieve the entity from the database or create a new one if it does not exist
        $settings = $this->entityManager->getRepository(UsersSettings::class)->findOneBy(['key' => $key, 'user' => $this->user]);

        if (null === $settings) {
            return null;
        }

        // Store the entity in the cache
        $this->cache['UsersSettings'][$key] = $settings;

        return $settings;
    }

    /**
     * @param mixed[] $options
     * @param mixed[] $data
     */
    public function save(string $key, array $data, array $options = []): void
    {
        if (null == $this->user) {
            return;
        }

        // Retrieve the entity object
        $settings = $this->getEntityObject($key);

        if (null == $settings) {
            $settings = new UsersSettings($key);

            /**
             * @phpstan-ignore method.notFound
             */
            $user = $this->entityManager->getRepository(User::class)->findOneBy(['id' => $this->user->getId()]);
            $user->addSetting($settings);

            // Set the data
            $settings->setData($data);

            // Persist the entity (if not already done)
            $this->entityManager->persist($settings);
            $this->entityManager->persist($user);
        } else {
            // Set the data
            $settings->setData($data);

            // Persist the entity (if not already done)
            $this->entityManager->persist($settings);
        }

        // And save the changes
        $this->entityManager->flush();
    }

    /**
     * @param mixed[] $options
     *
     * @return mixed[]
     */
    public function load(string $key, array $options = []): ?array
    {
        $settings = $this->getEntityObject($key);

        if (null == $settings) {
            return null;
        }

        return $settings->getData();
    }
}
