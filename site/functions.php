<?php

function view($page, $data) {
  if(session_status() !== PHP_SESSION_ACTIVE)  {
    session_start();
  }
  
  global $siteInfo;
  
  $site = array(
    "baseURL"       => $siteInfo['baseURL'],
  );
  
  if (is_array($data)) {
    extract($data);
  }
  
  require_once $siteInfo['root'].'/site/App/Views/_static/layout.view.php';
  
  Validation::clear();
  
}

function view_single($page, $data) {
  
  if(session_status() !== PHP_SESSION_ACTIVE)  {
    session_start();
  }
  
  global $siteInfo;
  
  $site = array(
    "baseURL"       => $siteInfo['baseURL'],
  );
  
  if (is_array($data)) {
    extract($data);
  }
  
  require_once $siteInfo['root'].'/site/App/Views/'.$page.'.view.php';
  
  Validation::clear();
  
}

function redirect($link) {
  global $siteInfo;
  
  if (!headers_sent()) {
    header('Location: '.$siteInfo['urlPrefix'].$link);
    exit;
  } else {
    echo '<script type="text/javascript">window.location = "'.$siteInfo['urlPrefix'].$link.'"</script>';
  }
}

function old($field) {
  return Validation::getOld($field);
}

function dd($var) {
  echo '<div style="
  white-space: pre-wrap;
  background: #000;
  color: #fff;
  font-family: Arial;
  font-size: 14px;
  padding: 6px 12px;
  line-height: 18px;
  min-width: 100%;
  box-sizing: border-box;
  ">';
  var_dump($var);
  echo '</div>';
  die();
}

?>
