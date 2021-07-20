<?php

class Request
{
  
  public static function getPath() {
    $path = self::path();
    $shortPath = self::shortPath();
    
    return array(
      'path' => $path,
      'parsedPath' => self::parseUrl($path),
      'shortPath' => $shortPath,
      'parsedShortPath' => self::parseUrl($shortPath),
    );
  }
  
  public static function path()
  {
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  }
  
  public static function shortPath() {
    global $siteInfo;
    $shortURL = substr(self::path(), strlen($siteInfo['baseURL']));
    return $shortURL;
  }
  
  public static function parseUrl($path, $nivel = null){
    $url = explode("/", $path);
    
    if(!is_null($nivel)) {
      return $url[$nivel];
    }
    
    return $url;
  }
  
  public static function method() {
    return $_SERVER['REQUEST_METHOD'];
  }
  
}