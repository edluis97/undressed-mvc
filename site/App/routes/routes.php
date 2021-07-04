<?php 
// pathTo/
Router::get('','welcomeController@welcome');
// pathTo/welcome
Router::get('welcome', 'welcomeController@welcome');
?>