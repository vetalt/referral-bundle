VetaltReferralBundle
====================

trial project

install
-------
1) install FOSUserBundle.

2) install the bundle using composer:
```js
{
    "require": {
        "friendsofsymfony/user-bundle": "~2.0@dev"
    }
}
```

3) enable the bundle in the kernel:
``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Vetalt\ReferralBundle\VetaltReferralBundle(),
    );
}
```

4) edit FOSUserBundle settings:
``` yaml
# app/config/config.yml
fos_user:
    ...
    user_class: Vetalt\ReferralBundle\Entity\User
    registration:
        form:
            type: vetalt_referral_registration
        confirmation:
            enabled: true
```

5) update database schema:
``` bash
$ php app/console doctrine:schema:update --force
```
