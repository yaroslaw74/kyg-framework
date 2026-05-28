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

namespace App\Modules\Api\Security;

use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Http\AccessToken\AccessTokenHandlerInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Yokai\SecurityTokenBundle\Exception as TokenExceptions;
use Yokai\SecurityTokenBundle\Manager\TokenManagerInterface;

class AccessTokenHandler implements AccessTokenHandlerInterface
{
    public function __construct(private TokenManagerInterface $tokenManager)
    {
    }

    public function getUserBadgeFrom(string $accessToken): UserBadge
    {
        $token = null;
        try {
            $token = $this->tokenManager->get('api_key', $accessToken);
        } catch (TokenExceptions\TokenNotFoundException $e) {
            throw new BadCredentialsException('There is no token with the asked value', $e->getCode(), $e);
        } catch (TokenExceptions\TokenExpiredException $e) {
            throw new BadCredentialsException('A token was found, but expired', $e->getCode(), $e);
        } catch (TokenExceptions\TokenConsumedException $e) {
            throw new BadCredentialsException('A token was found, but already consumed', $e->getCode(), $e);
        }

        $user = $this->tokenManager->getUser($token);

        $this->tokenManager->consume($token);

        return new UserBadge($user->getUsername());
    }
}
