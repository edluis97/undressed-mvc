<?php

class Date
{

  public static function short($date) {

    $monthArray = [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec"
    ];

    $monthIndex = intval(date("m", strtotime($date))) - 1;
    $month = $monthArray[$monthIndex];

    return date("d", strtotime($date)) . ' ' . $month. ' ' . date("Y H:i", strtotime($date));
  }

  public static function long($date) {

    $monthArray = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December"
    ];

    $monthIndex = intval(date("m", strtotime($date))) - 1;
    $month = $monthArray[$monthIndex];

    return date("d", strtotime($date)) . ' ' . $month. ' ' . date("Y H:i", strtotime($date));
  }

  public static function longDate($date) {

    $monthArray = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December"
    ];

    $monthIndex = intval(date("m", strtotime($date))) - 1;
    $month = $monthArray[$monthIndex];

    return date("d", strtotime($date)) . ' ' . $month. ' ' . date("Y", strtotime($date));
  }
  
  public static function todayinBetween($startDate, $endDate) {
    $now = new DateTime();
    return self::inBetween($now, $startDate, $endDate);
  }
  
  public static function inBetween($currDate, $startDate, $endDate) {
    
    $startDate = new DateTime($startDate);
    $endDate = new DateTime($endDate);
    $endDate->modify('+1 day');
    
    if($currDate >= $startDate && $currDate < $endDate) {
      return true;
		} else {
      return false;
		}
    
  }

}
