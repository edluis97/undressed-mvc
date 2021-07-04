<?php

if(!function_exists("autoLoader")) {
  
  function autoLoader($className) {
    global $siteInfo;
    $extension = ".class.php";
    $class = $className.$extension;
    
    $sources = array(
      $siteInfo['root']."/site/App/Controllers/".$class,
      $siteInfo['root']."/site/App/Models/".$class,
      $siteInfo['root']."/site/Core/".$class,
      $siteInfo['root']."/site/Core/Mail/".$class,
      $siteInfo['root']."/site/Core/WebSockets/".$class,
    );
    
    foreach($sources as $source) {
      if (file_exists($source)) {
        require_once $source;
      }
    }
    
  }
  
}

spl_autoload_register('autoLoader');
