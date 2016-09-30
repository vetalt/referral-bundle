<?php

namespace Transmitter\ReferralBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TransmitterReferralBundle extends Bundle {

    public function getParent() {
        return 'FOSUserBundle';
    }

}
