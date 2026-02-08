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

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class UserCoreControllerTest extends WebTestCase
{
    public function testUserList(): void
    {
        $client = static::createClient();
        $client->request('GET', '/app/user/list');

        self::assertResponseIsSuccessful();
    }
}
