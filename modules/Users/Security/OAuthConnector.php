<?php

/**
 * KYG Framework for Business.
 *
 * @category   Security
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Users\Security;

use Doctrine\ORM\EntityManagerInterface;
use HWI\Bundle\OAuthBundle\Connect\AccountConnectorInterface;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use Symfony\Component\PropertyAccess\PropertyAccessor;
use Symfony\Component\Security\Core\User\UserInterface;

final class OAuthConnector implements AccountConnectorInterface
{
    /**
     * @param array<string, string> $properties
     */
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly array $properties,
    ) {
    }

    public function connect(UserInterface $user, UserResponseInterface $response): void
    {
        if (!isset($this->properties[$response->getResourceOwner()->getName()])) {
            return;
        }

        $property = new PropertyAccessor();
        $property->setValue($user, $this->properties[$response->getResourceOwner()->getName()], $response->getUserIdentifier());

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}
