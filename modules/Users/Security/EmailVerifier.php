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

use App\Modules\Users\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\DependencyInjection\Attribute\Target;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Workflow\WorkflowInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;

class EmailVerifier
{
    public function __construct(
        private readonly VerifyEmailHelperInterface $verifyEmailHelper,
        private readonly MailerInterface $mailer,
        private readonly EntityManagerInterface $entityManager,
        #[Target('user_status')] private readonly WorkflowInterface $workflow,
    ) {
    }

    public function sendEmailConfirmation(string $verifyEmailRouteName, Users $users, TemplatedEmail $templatedEmail): void
    {
        $verifyEmailSignatureComponents = $this->verifyEmailHelper->generateSignature(
            $verifyEmailRouteName,
            (string) $users->getId(),
            (string) $users->getEmail(),
            ['id' => $users->getId()]
        );

        $context = $templatedEmail->getContext();
        $context['signedUrl'] = $verifyEmailSignatureComponents->getSignedUrl();
        $context['expiresAtMessageKey'] = $verifyEmailSignatureComponents->getExpirationMessageKey();
        $context['expiresAtMessageData'] = $verifyEmailSignatureComponents->getExpirationMessageData();

        $templatedEmail->context($context);

        $this->mailer->send($templatedEmail);
    }

    /**
     * @throws VerifyEmailExceptionInterface
     */
    public function handleEmailConfirmation(Request $request, Users $users): void
    {
        $this->verifyEmailHelper->validateEmailConfirmationFromRequest($request, (string) $users->getId(), (string) $users->getEmail());

        $users->setIsVerified(true);
        $this->workflow->apply($users, 'verified');

        $this->entityManager->persist($users);
        $this->entityManager->flush();
    }
}
