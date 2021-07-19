<?php 

$siteInfo = array(
  "root"  => $_SERVER['DOCUMENT_ROOT'].'/undressed-mvc',
  "baseURL" => '/undressed-mvc/',
);

$db = array(
  'host'  => 'localhost',
  'user'  => 'root',
  'password'  => '',
  'database'  => 'demo_store',
);

$smtp = array(
  'sender_address' => '',
  'sender_alias'  => '',
  'password'  => '',
  'port'  => '',
  'secure'  => '',
  'auth'  => '',
  'debug' => 0, //PHPMailer Debug 0 to 4
  'smtp_server' => '',
  'to_address'  => '',
  'to_alias'  => '',
  'reply_address' => '',
  'reply_alias' => '',
  "cc" => '',
  "ccName" => '',
  "bcc" => '',
  "bccName" => '',
);

?>