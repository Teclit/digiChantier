<?php
    //Require libraries from folder libraries
    require_once 'libraries/Core.php';
    require_once 'libraries/Controller.php';
    require_once 'libraries/Database.php';
    require_once 'Controllers/SessionHelper.php';
    require_once 'config/config.php';

    
    //Class SESION START
	SessionHelper::sessionStart();
    //Default Time zone
	date_default_timezone_set("Europe/Paris");

	
    //Instantiate core class
    $init = new Core();

