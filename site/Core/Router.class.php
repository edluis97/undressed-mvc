<?php

class Router
{
  
  public static $routes = array();
  
  public static function index() {
    
  $path = Request::getPath();
  $pathShort = $path['shortPath'];
  
  //Finding which is the approriate route, via regex
  foreach (self::$routes[Request::method()] as $route => $controller) {
    
    $route_regex = preg_replace('/\{(.*?)\}/', '(.*)', $route);
    $route_regex = str_replace('/', '\/', $route_regex);
    
    //Dollar sign ending ($ matches end of pattern)
    //Route can´t be just the beginning of the path, must be whole path
    if (preg_match('/'.$route_regex.'$/iD', $pathShort) && ($route_regex != '' || $route_regex == $pathShort)) {
      //Match was found
      self::UrlWildcardReplacement($route);
      
      if(array_key_exists(Request::getPath()['shortPath'], self::$routes[Request::method()])){
        return self::callController(self::$routes[Request::method()][Request::getPath()['shortPath']]);
      }
      
    }     
    
  }
  
  /* 404 Error */
  $controller = new pagesController();
  $controller->error_404();
  
}

public static function callController($controller){
  
  $controller = explode("@", $controller);
  
  $class = $controller[0];
  $method = $controller[1];
  
  $controller = new $class;
  $controller->$method();
  
}

public static function UrlWildcardReplacement($route){
  
  $path = Request::getPath();
  $path = $path['parsedShortPath'];
  
  $controller = self::$routes[Request::method()][$route];
  $newRoute = '';
  $routes = explode("/", $route);
  
  foreach($routes as $index => $param){
    
    if(preg_match('/\{(.*?)\}/', $param)){
      
      if(isset($path[$index])){
        
        $param = str_replace('{', '', $param);
          $param = str_replace('}', '', $param);
          
          $_REQUEST[$param] = $path[$index];
          $newRoute .= $path[$index] . "/";
          
        }
        
      } else {
        $newRoute .= $param . "/";
      }
      
    }
    
    $newRoute = substr($newRoute, 0, -1);
    $newRoutes[Request::method()][$newRoute] = $controller;  
    
    self::clear();
    self::$routes[Request::method()] = $newRoutes[Request::method()];
    
  }
  
  public static function get($path, $controller){
    self::$routes['GET'][$path] = $controller;
  }
  
  public static function post($path, $controller){
    self::$routes['POST'][$path] = $controller;
  }
  
  public static function clear(){
    unset(self::$routes[Request::method()]);
  }
  
  
}
