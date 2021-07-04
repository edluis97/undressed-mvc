<?php

class Str
{

  public static function permalink_clean($string) {
		$accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
		$special_cases = array('&' => 'and');
		$string = mb_strtolower(trim($string), 'UTF-8');
		$string = str_replace(array_keys($special_cases), array_values($special_cases), $string);
		$string = preg_replace($accents_regex, '$1', htmlentities($string, ENT_QUOTES, 'UTF-8'));
		$string = preg_replace("/[^a-z0-9]/u", "-", $string);
		$string = preg_replace("/[-]+/u", "-", $string);
		return $string;
  }

  public static function mediaSrcCorrect($txt) {
    global $siteInfo;
    $txt = str_replace('="media/', '="'.$siteInfo['baseURL'].'media/', $txt);
    return $txt;
  }

  public static function replaceMulti($str, $array) {
    foreach ($array as $search => $replace) {
      $str = str_replace($search, $replace, $str);
    }
    return $str;
  }

  public static function replaceIfEmpty($initial, $replacement) {
    if (!empty($initial)) {
      return $initial;
    } else {
      return $replacement;
    }
  }

}

