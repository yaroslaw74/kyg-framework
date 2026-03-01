<?php

/**
 * KYG Framework for Business.
 *
 * @category   test Controller
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class FileManagerControllerTest extends WebTestCase
{
    public function testFileManager(): void
    {
        $client = static::createClient();
        $client->request('GET', '/app/admin/file/manager');

        self::assertResponseIsSuccessful();
    }

    public function testFileManagerList(): void
    {
        $client = static::createClient();
        $client->request('GET', '/app/admin/file/manager/list/{list}');

        self::assertResponseIsSuccessful();
    }

    public function testFileManagerDetails(): void
    {
        $client = static::createClient();
        $client->request('GET', '/app/admin/file/manager/detalis/{path}/{name}');

        self::assertResponseIsSuccessful();
    }
}
