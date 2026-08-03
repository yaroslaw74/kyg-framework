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

namespace App\Modules\Users\Controller;

use App\Modules\Users\Entity\Users;
use App\Modules\Users\Form\Type\RegistrationFormType;
use App\Modules\Users\Repository\UsersRepository;
use App\Modules\Users\Security\EmailVerifier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\DependencyInjection\Attribute\Target;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Workflow\WorkflowInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

/**
 * @see \App\Tests\Controller\RegistrationControllerTest
 */
class RegistrationController extends AbstractController
{
    public function __construct(
        private readonly EmailVerifier $emailVerifier,
        private readonly TranslatorInterface $translator,
        #[Target('user_status')] private readonly WorkflowInterface $workflow,
    ) {
    }

    #[Route('/app/register', name: 'app_register', methods: ['GET', 'POST'])]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, Security $security, EntityManagerInterface $entityManager): Response
    {
        $users = new Users();
        $form = $this->createForm(RegistrationFormType::class, $users);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var string $plainPassword */
            $plainPassword = $form->get('plainPassword')->getData();

            // encode the plain password
            $users->setPassword($userPasswordHasher->hashPassword($users, $plainPassword));

            $this->workflow->apply($users, 'pending');
            $users->setCreatedAt(new \DateTime());
            $users->setCreatedBy((string) $users);

            $entityManager->persist($users);
            $entityManager->flush();

            $templatedEmail = new TemplatedEmail();
            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation(
                'app_verify_email',
                $users,
                $templatedEmail
                    ->from(new Address($this->getParameter('app.email_bot'), $this->getParameter('app.name_bot')))
                    ->to((string) $users->getEmail())
                    ->subject($this->translator->trans('Please Confirm your Email', [], 'users'))
                    ->htmlTemplate('@Users/registration/confirmation_email.html.twig')
            );

            // do anything else you need here, like send an email

            return $security->login($users, 'form_login', 'app');
        }

        return $this->render('@Users/registration/signup.html.twig', [
            'registrationForm' => $form,
        ]);
    }

    #[Route('/app/verify/email', name: 'app_verify_email', methods: ['GET', 'POST'])]
    public function verifyUserEmail(Request $request, UsersRepository $usersRepository): Response
    {
        $id = $request->query->get('id');

        if (null === $id) {
            return $this->redirectToRoute('app_register');
        }

        $user = $usersRepository->find($id);

        if (null === $user) {
            return $this->redirectToRoute('app_register');
        }

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $user);
        } catch (VerifyEmailExceptionInterface $verifyEmailException) {
            $this->addFlash('verify_email_error', $this->translator->trans($verifyEmailException->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_register');
        }

        $this->addFlash('success', $this->translator->trans('Your email address has been verified.', [], 'users'));

        return $this->redirectToRoute('app');
    }
}
