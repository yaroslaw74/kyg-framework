<?php
/**********************************************************************************
 * @Project    KYG Framework for Business
 * @Version    1.0.0
 *
 * @Copyright  (C) Kataev Yaroslav
 * @E-mail     yaroslaw74@gmail.com
 * @License    GNU General Public License version 3 or later, see LICENSE
 *********************************************************************************/
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class CoreControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');

        self::assertResponseIsSuccessful();
    }
}
