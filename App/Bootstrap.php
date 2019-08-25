<?php

// load config 
require_once 'Config/Config.php';
// helper file 
require_once 'Helpers/url_helper.php';
require_once 'Helpers/session_helper.php';

//Autoload Core libraries
spl_autoload_register(function($className){
    require_once 'Libraries/'. $className . '.php';
});