<?php

namespace Vetalt\ReferralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReferralController extends Controller {

    public function indexAction() {
        $references = $this->getDoctrine()
                ->getRepository('VetaltReferralBundle:Reference')
                ->findAll();
        
        return $this->render(
                'VetaltReferralBundle:Referral:index.html.twig',
                ['list' => $references]);
    }

}
