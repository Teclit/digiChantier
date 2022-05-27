<?php

    //Stripe_API
    define('STRIPE_API_KEY', 'Your_API_Secret_key');  
    define('STRIPE_PUBLISHABLE_KEY', 'pk_live_51KH3ckFVIk8Lst3qHfheQfHhywenYVMMXgGJyY8MsW9nDYM80eRFXfy7hX9G5sU8WgiJ0H4DAjxLKAvqf8WOPsGJ00NkJPd5JT'); 

    //Database params
    define('DB_HOST', 'localhost'); //Add your db host
    define('DB_USER', 'root'); // Add your DB root
    define('DB_PASS', ''); //Add your DB pass
    define('DB_NAME', 'digicotekchantier'); //Add your DB Name

    //Prix Param
    define('packUnite',      'PKUNITE'); //Prix un lead by unite
    define('packDepartment', 'PKDEPARTMENT');// Prix des lead by deparment
    define('packRegion',     'PKREGION'); //Prix des lead by Region
    define('packPays',        'PKPAYS'); //Prix des lead by pays
    
    //APPROOT
    define('APPROOT', dirname(dirname(__FILE__)));

    //URLROOT (Dynamic links)
    define('URLROOT', 'http://localhost/DigicotekStage/digicotekchantier');
    define('URLDOCS', '/DigicotekStage/digicotekchantier/public/uploads/');

    //Sitename
    define('SITENAME', 'Digicotek Chantier');

