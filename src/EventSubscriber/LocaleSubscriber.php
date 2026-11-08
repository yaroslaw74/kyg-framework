<?php

/**
 * KYG Framework for Business.
 *
 * @category   Event Subscriber
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\EventSubscriber;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final readonly class LocaleSubscriber
{
    private string $defaultLocale;

    public function __construct(private ContainerBagInterface $params)
    {
        $this->defaultLocale = $this->params->get('kernel.default_locale');
    }

    #[AsEventListener(event: KernelEvents::REQUEST, priority: 20)]
    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();
        if (!$request->hasPreviousSession()) {
            return;
        }

        $locale = $request->request->getString('_locale');

        // try to see if the locale has been set as a _locale routing parameter
        if ('' !== $locale) {
            $request->getSession()->set('_locale', $locale);
        } else {
            // if no explicit locale has been set on this request, use one from the session
            $request->setLocale($request->getSession()->get('_locale', $this->defaultLocale));
        }
    }
}
