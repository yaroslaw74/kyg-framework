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

namespace App\Controller;

use App\Settings\WebSiteSettings;
use Jbtronics\SettingsBundle\Manager\SettingsManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Attribute\Route;

/**
 * @see \App\Tests\Controller\BaseControllerTest
 */
final class BaseController extends AbstractController
{
    private readonly WebSiteSettings $webSiteSettings;

    public function __construct(private readonly SettingsManagerInterface $settingsManager)
    {
        $this->webSiteSettings = $this->settingsManager->get(WebSiteSettings::class);
    }

    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(): RedirectResponse
    {
        if (!$this->webSiteSettings->getWebSiteEnabled()) {
            return $this->redirectToRoute('app');
        }

        // TODO: Implement logic to handle the case when the website is disabled, such as redirecting to a maintenance page or showing a message.
        return $this->redirectToRoute('app');
    }
}
