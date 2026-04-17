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

use App\Modules\Users\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class UsersCoreControllerTest extends WebTestCase
{
    private KernelBrowser $client;

    private EntityManagerInterface $manager;

    /**
     * @var EntityRepository<User>
     */
    private EntityRepository $userRepository;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->userRepository = $this->manager->getRepository(User::class);

        foreach ($this->userRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', '/app/user/list');

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('User index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first()->text());
    }

    public function testNew(): void
    {
        $this->client->request('GET', \sprintf('/%s', '/app/user/add'));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'user[username]' => 'username',
            'user[email]' => 'me@example.com',
            'user[password]' => 'password',
            'user[firstName]' => 'FirstName',
            'user[lastName]' => 'LastName',
            'user[middleName]' => 'MiddleName',
        ]);

        self::assertResponseRedirects('/app/user/list');

        self::assertSame(1, $this->userRepository->count([]));

        self::markTestIncomplete('This test was generated');
    }

    public function testShow(): void
    {
        $fixture = new User();
        $fixture->setUsername('My Title');
        $fixture->setEmail('My Title');
        $fixture->setPassword('My Title');
        $fixture->setFirstName('My Title');
        $fixture->setLastName('My Title');
        $fixture->setMiddleName('My Title');
        $fixture->setMobile('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', \sprintf('/%s%s', '/app/user/profile', $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('User');

        // Use assertions to check that the properties are properly displayed.
        self::markTestIncomplete('This test was generated');
    }

    public function testEdit(): void
    {
        $fixture = new User();
        $fixture->setUsername('username');
        $fixture->setEmail('me@example.com');
        $fixture->setPassword('password');
        $fixture->setFirstName('FirstName');
        $fixture->setLastName('LastName');
        $fixture->setMiddleName('MiddleName');
        $fixture->setAvatar(null);
        $fixture->setMobile('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', \sprintf('/%s%s', '/app/user/editprofile', $fixture->getId()));

        $this->client->submitForm('Update', [
            'user[username]' => 'username',
            'user[email]' => 'me@example.com',
            'user[password]' => 'password',
            'user[firstName]' => 'FirstName',
            'user[lastName]' => 'LastName',
            'user[middleName]' => 'MiddleName',
            'user[avatar]' => null,
            'user[mobile]' => 'Something New',
        ]);

        self::assertResponseRedirects('/app/user/list');

        $fixture = $this->userRepository->findAll();

        self::assertSame('username', $fixture[0]->getUsername());
        self::assertSame('me@example.com', $fixture[0]->getEmail());
        self::assertSame('password', $fixture[0]->getPassword());
        self::assertSame('FirstName', $fixture[0]->getFirstName());
        self::assertSame('LastName', $fixture[0]->getLastName());
        self::assertSame('MiddleName', $fixture[0]->getMiddleName());
        self::assertSame('Something New', $fixture[0]->getMobile());

        self::markTestIncomplete('This test was generated');
    }

    public function testDelete(): void
    {
        $fixture = new User();
        $fixture->setUsername('username');
        $fixture->setEmail('me@example.com');
        $fixture->setPassword('password');
        $fixture->setFirstName('FirstName');
        $fixture->setLastName('LastName');
        $fixture->setMiddleName('MiddleName');
        $fixture->setMobile('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', \sprintf('/%s%s', '/app/user/delite', $fixture->getId()));

        self::assertResponseRedirects('/app/user/list');
        self::assertSame(0, $this->userRepository->count([]));

        self::markTestIncomplete('This test was generated');
    }

    public function testSettings(): void
    {
        $fixture = new User();
        $fixture->setUsername('username');
        $fixture->setEmail('me@example.com');
        $fixture->setPassword('password');
        $fixture->setFirstName('FirstName');
        $fixture->setLastName('LastName');
        $fixture->setMiddleName('MiddleName');
        $fixture->setMobile('Value');
        $fixture->setLocale('en_001');
        $fixture->setTimezone('UTC');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', \sprintf('/%s', '/app/user/settings'));

        $this->client->submitForm('Update', [
            'user[username]' => 'username',
            'user[email]' => 'me@example.com',
            'user[password]' => 'password',
            'user[firstName]' => 'FirstName',
            'user[lastName]' => 'LastName',
            'user[middleName]' => 'MiddleName',
            'user[mobile]' => 'Something New',
            'user[locale]' => 'en_001',
            'user[timezone]' => 'UTC',
        ]);

        self::assertResponseRedirects('/app/user/settings');

        $fixture = $this->userRepository->findAll();

        self::assertSame('username', $fixture[0]->getUsername());
        self::assertSame('me@example.com', $fixture[0]->getEmail());
        self::assertSame('password', $fixture[0]->getPassword());
        self::assertSame('FirstName', $fixture[0]->getFirstName());
        self::assertSame('LastName', $fixture[0]->getLastName());
        self::assertSame('MiddleName', $fixture[0]->getMiddleName());
        self::assertSame('Something New', $fixture[0]->getMobile());
        self::assertSame('en_001', $fixture[0]->getLocale());
        self::assertSame('UTC', $fixture[0]->getTimezone());

        self::markTestIncomplete('This test was generated');
    }
}
