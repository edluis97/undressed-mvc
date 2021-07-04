<?php

//Configs
require_once 'configs.php';

//AutoLoader
require_once 'site/_autoloader.php';

//Functions
require_once 'site/functions.php';

//Establishing Database connection for further use
DB::connect();

//Routing
require_once 'site/App/routes/routes.php';
Router::index();

?>
