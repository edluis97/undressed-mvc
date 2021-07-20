<?php

if(!function_exists("autoLoader")) {
  
  function autoLoader($className) {
    global $siteInfo;
    $extension = ".class.php";
    $class = $className.$extension;
    
    $sources = array(
      $siteInfo['root']."/App/Controllers/".$class,
      $siteInfo['root']."/App/Models/".$class,
      $siteInfo['root']."/Core/".$class,
      $siteInfo['root']."/Core/Mail/".$class,
      $siteInfo['root']."/Core/WebSockets/".$class,
    );
    
    foreach($sources as $source) {
      if (file_exists($source)) {
        require_once $source;
      }
    }
    
  }
  
}

spl_autoload_register('autoLoader');
