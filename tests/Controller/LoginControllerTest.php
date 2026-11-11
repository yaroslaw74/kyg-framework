<?php

/**
 * KYG Framework for Business.
 *
 * @category   Controller Test
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Tests\Controller;

use App\Modules\Users\Entity\User;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class LoginControllerTest extends WebTestCase
{
    private KernelBrowser $client;

    #[\Override]
    protected function setUp(): void
    {
        $this->client = self::createClient();
        $container = self::getContainer();
        $em = $container->get('doctrine.orm.entity_manager');
        /**
         * @phpstan-ignore doctrine.noGetRepositoryOutsideService
         */
        $userRepository = $em->getRepository(User::class);

        // Remove any existing users from the test database
        foreach ($userRepository->findAll() as $user) {
            $em->remove($user);
        }

        $em->flush();

        // Create a User fixture
        $passwordHasher = $container->get('security.user_password_hasher');

        $user = new User();
        $user->setEmail('email@example.com');
        $user->setUsername('username');
        $user->setPassword($passwordHasher->hashPassword($user, 'password'));

        $em->persist($user);
        $em->flush();
    }

    public function testLogin(): void
    {
        // Denied - Can't login with invalid email address.
        $this->client->request('GET', '/app/login');
        self::assertResponseIsSuccessful();

        $this->client->submitForm('Sign in', [
            '_email' => 'doesNotExist@example.com',
            '_username' => 'username',
            '_password' => 'password',
        ]);

        self::assertResponseRedirects('/app/login');
        $this->client->followRedirect();

        // Ensure we do not reveal if the user exists or not.
        self::assertSelectorTextContains('.alert-danger', 'Invalid credentials.');

        // Denied - Can't login with invalid password.
        $this->client->request('GET', '/app/login');
        self::assertResponseIsSuccessful();

        $this->client->submitForm('Sign in', [
            '_email' => 'email@example.com',
            '_username' => 'bad-username',
            '_password' => 'bad-password',
        ]);

        self::assertResponseRedirects('/app/login');
        $this->client->followRedirect();

        // Ensure we do not reveal the user exists but the password is wrong.
        self::assertSelectorTextContains('.alert-danger', 'Invalid credentials.');

        // Success - Login with valid credentials is allowed.
        $this->client->submitForm('Sign in', [
            '_email' => 'email@example.com',
            '_username' => 'username',
            '_password' => 'password',
        ]);

        self::assertResponseRedirects('/app');
        $this->client->followRedirect();

        self::assertSelectorNotExists('.alert-danger');
    }
}
