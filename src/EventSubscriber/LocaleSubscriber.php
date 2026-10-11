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
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final readonly class LocaleSubscriber implements EventSubscriberInterface
{
    private string $defaultLocale;

    public function __construct(private ContainerBagInterface $containerBag)
    {
        $this->defaultLocale = $this->containerBag->get('kernel.default_locale');
    }

    public function onKernelRequest(RequestEvent $requestEvent): void
    {
        $request = $requestEvent->getRequest();
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

    /**
     * @return array<string, string|array{0: string, 1?: int}|array{method: string, priority?: int, before?: string|list<string>, after?: string|list<string>}|list<array{0: string, 1?: int}|array{method: string, priority?: int, before?: string|list<string>, after?: string|list<string>}>>
     */
    #[\Override]
    public static function getSubscribedEvents(): array
    {
        return [
            // must be registered before (i.e. with a higher priority than) the default Locale listener
            KernelEvents::REQUEST => [['onKernelRequest', 20]],
        ];
    }
}
