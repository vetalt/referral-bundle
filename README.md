TransmitterReferralBundle
====================

trial project

install
-------
1) install FOSUserBundle.

2) install the bundle using composer:
```js
{
"require": {
    "transmitter/referral-bundle": "dev-master"
},
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/transmitter/referral-bundle"
    }
],
```

3) enable the bundle in the kernel:
``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Transmitter\ReferralBundle\TransmitterReferralBundle(),
    );
}
```

4) edit FOSUserBundle settings:
``` yaml
# app/config/config.yml
fos_user:
    ...
    user_class: Transmitter\ReferralBundle\Entity\User
    registration:
        form:
            type: transmitter_referral_registration
        confirmation:
            enabled: true
```

5) update database schema:
``` bash
$ php app/console doctrine:schema:update --force
```

6) import routing file
``` yaml
# app/config/routing.yml
_transmitter_referral:
    resource: "@TransmitterReferralBundle/Resources/config/routing.yml"
```
