<?php

class Number
{
  
  public static function isPositive($num) {
    if (is_numeric($num) && $num > 0) {
      return true;
    } else {
      return false;
    }
  }
  
}