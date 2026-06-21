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
;

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
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->userRepository = $this->manager->getRepository(Users::class);

        foreach ($this->userRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', '/app/user');

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
            'user[username]' => 'Testing',
            'user[email]' => 'Testing',
            'user[password]' => 'Testing',
            'user[firstName]' => 'Testing',
            'user[lastName]' => 'Testing',
            'user[middleName]' => 'Testing',
            'user[locale]' => 'Testing',
            'user[facebook]' => 'Testing',
            'user[yandex]' => 'Testing',
            'user[google]' => 'Testing',
            'user[linkedin]' => 'Testing',
            'user[mailru]' => 'Testing',
            'user[odnoklassniki]' => 'Testing',
            'user[xTwitter]' => 'Testing',
            'user[vkontakte]' => 'Testing',
            'user[github]' => 'Testing',
            'user[amazon]' => 'Testing',
            'user[instagram]' => 'Testing',
            'user[twitch]' => 'Testing',
            'user[yahoo]' => 'Testing',
            'user[spotify]' => 'Testing',
            'user[trello]' => 'Testing',
            'user[dropbox]' => 'Testing',
            'user[flickr]' => 'Testing',
            'user[windowsLive]' => 'Testing',
            'user[gravatar]' => 'Testing',
            'user[avatar]' => 'Testing',
        ]);

        self::assertResponseRedirects('/app/user');

        self::assertSame(1, $this->userRepository->count([]));

        $this->markTestIncomplete('This test was generated');
    }

    public function testShow(): void
    {
        $fixture = new Users();
        $fixture->setUsername('My Title');
        $fixture->setEmail('My Title');
        $fixture->setPassword('My Title');
        $fixture->setFirstName('My Title');
        $fixture->setLastName('My Title');
        $fixture->setMiddleName('My Title');
        $fixture->setLocale('My Title');
        $fixture->setFacebook('My Title');
        $fixture->setYandex('My Title');
        $fixture->setGoogle('My Title');
        $fixture->setLinkedin('My Title');
        $fixture->setMailru('My Title');
        $fixture->setOdnoklassniki('My Title');
        $fixture->setXTwitter('My Title');
        $fixture->setVkontakte('My Title');
        $fixture->setGithub('My Title');
        $fixture->setAmazon('My Title');
        $fixture->setInstagram('My Title');
        $fixture->setTwitch('My Title');
        $fixture->setYahoo('My Title');
        $fixture->setSpotify('My Title');
        $fixture->setTrello('My Title');
        $fixture->setDropbox('My Title');
        $fixture->setFlickr('My Title');
        $fixture->setWindowsLive('My Title');
        $fixture->setGravatar('My Title');
        $fixture->setAvatar('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', \sprintf('/app/user/show/%s', $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('User');

        // Use assertions to check that the properties are properly displayed.
        $this->markTestIncomplete('This test was generated');
    }

    public function testEdit(): void
    {
        $fixture = new Users();
        $fixture->setUsername('Value');
        $fixture->setEmail('Value');
        $fixture->setPassword('Value');
        $fixture->setFirstName('Value');
        $fixture->setLastName('Value');
        $fixture->setMiddleName('Value');
        $fixture->setLocale('Value');
        $fixture->setFacebook('Value');
        $fixture->setYandex('Value');
        $fixture->setGoogle('Value');
        $fixture->setLinkedin('Value');
        $fixture->setMailru('Value');
        $fixture->setOdnoklassniki('Value');
        $fixture->setXTwitter('Value');
        $fixture->setVkontakte('Value');
        $fixture->setGithub('Value');
        $fixture->setAmazon('Value');
        $fixture->setInstagram('Value');
        $fixture->setTwitch('Value');
        $fixture->setYahoo('Value');
        $fixture->setSpotify('Value');
        $fixture->setTrello('Value');
        $fixture->setDropbox('Value');
        $fixture->setFlickr('Value');
        $fixture->setWindowsLive('Value');
        $fixture->setGravatar('Value');
        $fixture->setAvatar('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', \sprintf('/app/user/edit/%s', $fixture->getId()));

        $this->client->submitForm('Update', [
            'user[username]' => 'Something New',
            'user[email]' => 'Something New',
            'user[password]' => 'Something New',
            'user[firstName]' => 'Something New',
            'user[lastName]' => 'Something New',
            'user[middleName]' => 'Something New',
            'user[locale]' => 'Something New',
            'user[isVerified]' => 'Something New',
            'user[facebook]' => 'Something New',
            'user[yandex]' => 'Something New',
            'user[google]' => 'Something New',
            'user[linkedin]' => 'Something New',
            'user[mailru]' => 'Something New',
            'user[odnoklassniki]' => 'Something New',
            'user[xTwitter]' => 'Something New',
            'user[vkontakte]' => 'Something New',
            'user[github]' => 'Something New',
            'user[amazon]' => 'Something New',
            'user[instagram]' => 'Something New',
            'user[twitch]' => 'Something New',
            'user[yahoo]' => 'Something New',
            'user[spotify]' => 'Something New',
            'user[trello]' => 'Something New',
            'user[dropbox]' => 'Something New',
            'user[flickr]' => 'Something New',
            'user[windowsLive]' => 'Something New',
            'user[gravatar]' => 'Something New',
            'user[avatar]' => 'Something New',
        ]);

        self::assertResponseRedirects('/app/user');

        $fixture = $this->userRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getUsername());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getPassword());
        self::assertSame('Something New', $fixture[0]->getFirstName());
        self::assertSame('Something New', $fixture[0]->getLastName());
        self::assertSame('Something New', $fixture[0]->getMiddleName());
        self::assertSame('Something New', $fixture[0]->getLocale());
        self::assertSame('Something New', $fixture[0]->getFacebook());
        self::assertSame('Something New', $fixture[0]->getYandex());
        self::assertSame('Something New', $fixture[0]->getGoogle());
        self::assertSame('Something New', $fixture[0]->getLinkedin());
        self::assertSame('Something New', $fixture[0]->getMailru());
        self::assertSame('Something New', $fixture[0]->getOdnoklassniki());
        self::assertSame('Something New', $fixture[0]->getXTwitter());
        self::assertSame('Something New', $fixture[0]->getVkontakte());
        self::assertSame('Something New', $fixture[0]->getGithub());
        self::assertSame('Something New', $fixture[0]->getAmazon());
        self::assertSame('Something New', $fixture[0]->getInstagram());
        self::assertSame('Something New', $fixture[0]->getTwitch());
        self::assertSame('Something New', $fixture[0]->getYahoo());
        self::assertSame('Something New', $fixture[0]->getSpotify());
        self::assertSame('Something New', $fixture[0]->getTrello());
        self::assertSame('Something New', $fixture[0]->getDropbox());
        self::assertSame('Something New', $fixture[0]->getFlickr());
        self::assertSame('Something New', $fixture[0]->getWindowsLive());
        self::assertSame('Something New', $fixture[0]->getGravatar());
        self::assertSame('Something New', $fixture[0]->getAvatar());

        $this->markTestIncomplete('This test was generated');
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
        $fixture->setFacebook('Value');
        $fixture->setYandex('Value');
        $fixture->setGoogle('Value');
        $fixture->setLinkedin('Value');
        $fixture->setMailru('Value');
        $fixture->setOdnoklassniki('Value');
        $fixture->setXTwitter('Value');
        $fixture->setVkontakte('Value');
        $fixture->setGithub('Value');
        $fixture->setAmazon('Value');
        $fixture->setInstagram('Value');
        $fixture->setTwitch('Value');
        $fixture->setYahoo('Value');
        $fixture->setSpotify('Value');
        $fixture->setTrello('Value');
        $fixture->setDropbox('Value');
        $fixture->setFlickr('Value');
        $fixture->setWindowsLive('Value');
        $fixture->setGravatar('Value');
        $fixture->setAvatar('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', \sprintf('/app/user/delete/%s', $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/app/user');
        self::assertSame(0, $this->userRepository->count([]));

        $this->markTestIncomplete('This test was generated');
    }
}
