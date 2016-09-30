<?php

namespace Transmitter\ReferralBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Transmitter\ReferralBundle\Entity\Reference;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\DependencyInjection\Container;

class RequestListener {

    private $router;
    private $em;
    private $container;

    public function __construct(Router $router, EntityManager $em, Container $container) {
        $this->router = $router;
        $this->em = $em;
        $this->container = $container;
    }

    public function onKernelRequest(GetResponseEvent $event) {
        if ($event->getRequestType() != HttpKernel::MASTER_REQUEST) {
            return;
        }

        $get_param_name = $this->container->getParameter('transmitter_referral.get_param_name');
        $cookie_name = $this->container->getParameter('transmitter_referral.cookie_name');
        $cookie_time = $this->container->getParameter('transmitter_referral.cookie_time');

        $request = $event->getRequest();

        if ($request->query->has($get_param_name)) {
            $reference = new Reference();
            $reference->setIp($request->getClientIp());
            $reference->setRefcode($request->query->get($get_param_name));
            $reference->setReferer($request->headers->get('referer'));
            $this->em->persist($reference);
            $this->em->flush();

            $request->query->remove($get_param_name);
            $route = $request->get('_route');
            $uri = $this->router->generate($route, $request->query->all());

            $response = new RedirectResponse($uri);
            $cookie = new Cookie($cookie_name, $reference->getId(), time() + $cookie_time);
            $response->headers->setCookie($cookie);
            $event->setResponse($response);
        }
    }

}
