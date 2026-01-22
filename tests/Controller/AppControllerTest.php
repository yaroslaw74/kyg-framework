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

final class AppControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/app');

        self::assertResponseIsSuccessful();
    }

    public function testHome(): void
    {
        $client = static::createClient();
        $client->request('GET', '/app');

        self::assertResponseIsSuccessful();
    }
}
