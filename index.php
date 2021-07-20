<?php

//Configs
require_once 'configs.php';

//AutoLoader
require_once 'autoloader.php';

//Functions
require_once 'functions.php';

//Establishing Database connection for further use
DB::connect();

//Routing
require_once 'App/routes/routes.php';
Router::index();

?>
