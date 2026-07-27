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

use App\Modules\Users\Entity\Users;
use App\Modules\Users\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class ResetPasswordControllerTest extends WebTestCase
{
    private KernelBrowser $kernelBrowser;

    private EntityManagerInterface $entityManager;

    private UsersRepository $usersRepository;

    protected function setUp(): void
    {
        $this->kernelBrowser = self::createClient();

        // Ensure we have a clean database
        $container = self::getContainer();

        /** @var EntityManagerInterface $em */
        $em = $container->get('doctrine')->getManager();
        $this->entityManager = $em;

        $this->usersRepository = $container->get(UsersRepository::class);

        foreach ($this->usersRepository->findAll() as $user) {
            $this->entityManager->remove($user);
        }

        $this->entityManager->flush();
    }

    public function testResetPasswordController(): void
    {
        // Create a test user
        $user = new Users();
        $user
            ->setEmail('me@example.com')
            ->setPassword('a-test-password-that-will-be-changed-later')
        ;
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        // Test Request reset password page
        $this->kernelBrowser->request('GET', '/app/reset-password');

        self::assertResponseIsSuccessful();
        self::assertPageTitleContains('Reset your password');

        // Submit the reset password form and test email message is queued / sent
        $this->kernelBrowser->submitForm('Send password reset email', [
            'reset_password_request_form[email]' => 'me@example.com',
        ]);

        // Ensure the reset password email was sent
        // Use either assertQueuedEmailCount() || assertEmailCount() depending on your mailer setup
        // self::assertQueuedEmailCount(1);
        self::assertEmailCount(1);

        self::assertCount(1, $messages = self::getMailerMessages());

        self::assertEmailAddressContains($messages[0], 'from', 'mailer@your-domain.com');
        self::assertEmailAddressContains($messages[0], 'to', 'me@example.com');
        self::assertEmailTextBodyContains($messages[0], 'This link will expire in 1 hour.');

        self::assertResponseRedirects('/app/reset-password/check-email');

        // Test check email landing page shows correct "expires at" time
        $crawler = $this->kernelBrowser->followRedirect();

        self::assertPageTitleContains('Password Reset Email Sent');
        self::assertStringContainsString('This link will expire in 1 hour', $crawler->html());

        // Test the link sent in the email is valid
        $email = $messages[0]->toString();
        preg_match('#(/reset-password/reset/[a-zA-Z0-9]+)#', $email, $resetLink);

        $this->kernelBrowser->request('GET', $resetLink[1]);

        self::assertResponseRedirects('/app/reset-password/reset');

        $this->kernelBrowser->followRedirect();

        // Test we can set a new password
        $this->kernelBrowser->submitForm('Reset password', [
            'change_password_form[plainPassword][first]' => 'newStrongPassword',
            'change_password_form[plainPassword][second]' => 'newStrongPassword',
        ]);

        self::assertResponseRedirects('/app/home');

        $user = $this->usersRepository->findOneBy(['email' => 'me@example.com']);

        self::assertInstanceOf(Users::class, $user);

        $passwordHasher = self::getContainer()->get(UserPasswordHasherInterface::class);
        self::assertTrue($passwordHasher->isPasswordValid($user, 'newStrongPassword'));
    }
}
