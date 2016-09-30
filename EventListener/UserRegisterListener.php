<?php

namespace Transmitter\ReferralBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\UserEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\DependencyInjection\Container;

class UserRegisterListener implements EventSubscriberInterface {

    private $container;

    public function __construct(Container $container) {
        $this->container = $container;
    }

    public static function getSubscribedEvents() {
        return array(
            FOSUserEvents::REGISTRATION_INITIALIZE => 'onRegistrationSuccess',
        );
    }

    public function onRegistrationSuccess(UserEvent $event) {
        $request = $event->getRequest();
        $cookie_name = $this->container->getParameter('transmitter_referral.cookie_name');
        if ($request->cookies->has($cookie_name)) {
            $user = $event->getUser();
            $user->setReferenceId($request->cookies->get($cookie_name));
        }
    }

}
