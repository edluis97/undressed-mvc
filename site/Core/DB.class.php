<?php

class DB {

  protected static $conn;

  public static function connect() {
    global $db;
    self::$conn = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
    mysqli_set_charset(self::$conn, "utf8");
  }

  public static function run($sql) {
    $query = mysqli_query(self::$conn, $sql);
  }

  public static function queryResults($sql) {
    $query = mysqli_query(self::$conn, $sql);
    $queryRes = mysqli_fetch_all($query, MYSQLI_ASSOC);
    mysqli_free_result($query);

    return $queryRes;
  }
  
  public static function querySingleResult($sql) {
    $query = mysqli_query(self::$conn, $sql);
    $queryRes = mysqli_fetch_assoc($query);
    mysqli_free_result($query);

    return $queryRes;
  }

  public static function count() {
    $query = mysqli_query(self::$conn, $sql);
    $count = mysqli_num_rows($query);
    mysqli_free_result($query);

    return $count;
  }
  
  public static function escape_string($str) {    
    return mysqli_real_escape_string(self::$conn, $str);
  }

}
