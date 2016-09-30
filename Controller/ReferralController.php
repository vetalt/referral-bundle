<?php

namespace Transmitter\ReferralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReferralController extends Controller {

    public function indexAction() {
        $references = $this->getDoctrine()
                ->getRepository('TransmitterReferralBundle:Reference')
                ->findAll();
        
        return $this->render(
                'TransmitterReferralBundle:Referral:index.html.twig',
                ['list' => $references]);
    }

}
