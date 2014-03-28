<?php

namespace Vetalt\ReferralBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class VetaltReferralBundle extends Bundle {

    public function getParent() {
        return 'FOSUserBundle';
    }

}
