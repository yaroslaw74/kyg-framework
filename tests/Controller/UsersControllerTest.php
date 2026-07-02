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
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class UsersControllerTest extends WebTestCase
{
    private KernelBrowser $client;

    private EntityManagerInterface $manager;

    /** @var EntityRepository<Users> */
    private EntityRepository $userRepository;

    protected function setUp(): void
    {
        $this->client = self::createClient();
        /* @phpstan-ignore assign.propertyType */
        $this->manager = self::getContainer()->get('doctrine')->getManager();
        $this->userRepository = $this->manager->getRepository(Users::class);

        foreach ($this->userRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $this->client->request('GET', '/app/user/list');

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('User index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first()->text());
    }

    public function testNew(): void
    {
        $this->client->request('GET', '/app/user/new');

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'user[username]' => 'Testing username',
            'user[email]' => 'testing@example.com',
            'user[password]' => 'Testing password',
            'user[firstName]' => 'Testing First Name',
            'user[lastName]' => 'Testing Last Name',
            'user[middleName]' => 'Testing Middle Name',
        ]);

        self::assertResponseRedirects('/app');

        self::assertSame(1, $this->userRepository->count([]));

        self::markTestIncomplete('This test was generated');
    }

    public function testShow(): void
    {
        $fixture = new Users();
        $fixture->setUsername('username');
        $fixture->setEmail('email@example.com');
        $fixture->setPassword('password');
        $fixture->setFirstName('First Name');
        $fixture->setLastName('Last Name');
        $fixture->setMiddleName('Middle Name');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', \sprintf('/app/user/show/%s', $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('User');

        // Use assertions to check that the properties are properly displayed.
        self::markTestIncomplete('This test was generated');
    }

    public function testEdit(): void
    {
        $fixture = new Users();
        $fixture->setUsername('username');
        $fixture->setEmail('email@example.com');
        $fixture->setPassword('password');
        $fixture->setFirstName('First Name');
        $fixture->setLastName('Last Name');
        $fixture->setMiddleName('Middle Name');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', \sprintf('/app/user/edit/%s', $fixture->getId()));

        $this->client->submitForm('Update', [
            'user[username]' => 'edit username',
            'user[email]' => 'edit@example.com',
            'user[password]' => 'edit password',
            'user[firstName]' => 'edit First Name',
            'user[lastName]' => 'edit Last Name',
            'user[middleName]' => 'edit Middle Name',
        ]);

        self::assertResponseRedirects('/app');

        $fixture = $this->userRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getUsername());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getPassword());
        self::assertSame('Something New', $fixture[0]->getFirstName());
        self::assertSame('Something New', $fixture[0]->getLastName());
        self::assertSame('Something New', $fixture[0]->getMiddleName());
        self::assertSame('Something New', $fixture[0]->getLocale());

        self::markTestIncomplete('This test was generated');
    }

    public function testRemove(): void
    {
        $fixture = new Users();
        $fixture->setUsername('Value');
        $fixture->setEmail('Value');
        $fixture->setPassword('Value');
        $fixture->setFirstName('Value');
        $fixture->setLastName('Value');
        $fixture->setMiddleName('Value');
        $fixture->setLocale('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', \sprintf('/app/user/delete/%s', $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/app');
        self::assertSame(0, $this->userRepository->count([]));

        self::markTestIncomplete('This test was generated');
    }

    public function testSetSettings(): void
    {
        $fixture = new Users();
        $fixture->setUsername('username');
        $fixture->setEmail('email@example.com');
        $fixture->setPassword('password');
        $fixture->setFirstName('First Name');
        $fixture->setLastName('Last Name');
        $fixture->setMiddleName('Middle Name');
        $fixture->setLocale('en');
        $fixture->setTimezone(date_default_timezone_get());

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', '/app/user/settings');

        $this->client->submitForm('Update', [
            'user[username]' => 'edit username',
            'user[email]' => 'edit@example.com',
            'user[password]' => 'edit password',
            'user[firstName]' => 'edit First Name',
            'user[lastName]' => 'edit Last Name',
            'user[middleName]' => 'edit Middle Name',
            'user[locale]' => 'ru',
            'user[timezone]' => 'Asia/Muscat',
        ]);

        self::assertResponseRedirects('/app');

        $fixture = $this->userRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getUsername());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getPassword());
        self::assertSame('Something New', $fixture[0]->getFirstName());
        self::assertSame('Something New', $fixture[0]->getLastName());
        self::assertSame('Something New', $fixture[0]->getMiddleName());
        self::assertSame('Something New', $fixture[0]->getLocale());
        self::assertSame('Something New', $fixture[0]->getTimezone());

        self::markTestIncomplete('This test was generated');
    }
}
