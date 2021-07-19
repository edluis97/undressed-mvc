<?php 

$siteInfo = array(
  "root"  => $_SERVER['DOCUMENT_ROOT'],
  "baseURL" => '/',
);

$db = array(
  'host'  => 'DB_HOST',
  'user'  => 'DB_USER',
  'password'  => 'DB_PASS',
  'database'  => 'DB_NAME',
);

$smtp = array(
  'smtp_server' => 'SMTP_SERVER',
  'port'  => 'SMTP_PORT',
  'sender_address' => 'SMTP_ADDRESS',
  'sender_alias'  => 'SMTP_ALIAS',
  'password'  => 'SMTP_PASS',  
  'secure'  => 'ssl', //ssl or tsl
  'auth'  => true,
  'debug' => 0, //PHPMailer Debug 0 to 4  
  'to_address'  => 'DEFAULT_EMAIL_DESTINATION',
  'to_alias'  => '',
  'reply_address' => '',
  'reply_alias' => '',
  "cc" => '',
  "ccName" => '',
  "bcc" => '',
  "bccName" => '',
);

?>