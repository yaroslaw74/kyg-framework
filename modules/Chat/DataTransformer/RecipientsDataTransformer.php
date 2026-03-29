<?php

/**
 * KYG Framework for Business.
 *
 * @category   Data Transformer
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Chat\DataTransformer;

use App\Modules\Users\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @implements DataTransformerInterface<Collection<int, User>, mixed|null>
 */
class RecipientsDataTransformer implements DataTransformerInterface
{
    /**
     * @param DataTransformerInterface<Collection<int, User>, string> $userToUsernameTransformer
     */
    public function __construct(private DataTransformerInterface $userToUsernameTransformer)
    {
    }

    /**
     * Transforms a collection of recipients into a string.
     *
     * @param Collection<int, User>|null $recipients
     *
     * @return string|null
     */
    public function transform(mixed $recipients): mixed
    {
        if (null === $recipients || 0 === $recipients->count()) {
            return '';
        }

        $usernames = [];

        foreach ($recipients as $recipient) {
            $usernames[] = $this->userToUsernameTransformer->transform($recipient);
        }

        return implode(', ', $usernames);
    }

    /**
     * Transforms a string (usernames) to a Collection of UserInterface.
     *
     * @param string|null $usernames
     *
     * @return Collection<int, User>|null $recipients
     *
     * @throws UnexpectedTypeException
     * @throws TransformationFailedException
     */
    public function reverseTransform(mixed $usernames): mixed
    {
        if (null === $usernames || '' === $usernames) {
            return null;
        }

        /* @phpstan-ignore function.alreadyNarrowedType */
        if (!\is_string($usernames)) {
            throw new UnexpectedTypeException($usernames, 'string');
        }

        $recipients = new ArrayCollection();
        $recipientsNames = array_filter(explode(',', $usernames));

        foreach ($recipientsNames as $username) {
            $user = $this->userToUsernameTransformer->reverseTransform(trim($username));

            if (!$user instanceof UserInterface) {
                throw new TransformationFailedException(\sprintf('User "%s" does not exists', $username));
            }

            $recipients->add($user);
        }

        return $recipients;
    }
}
