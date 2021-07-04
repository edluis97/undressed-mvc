<?php

require_once $siteInfo['root'].'/site/Core/Providers/PHPMailer/src/Exception.php';
require_once $siteInfo['root'].'/site/Core/Providers/PHPMailer/src/PHPMailer.php';
require_once $siteInfo['root'].'/site/Core/Providers/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Email
{
  
  public static function send($data) {
    global $smtp;
    
    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    
    try {        
         $mail->Host       = $smtp['smtp_server'];
         $mail->SMTPDebug  = $smtp['debug'];
         $mail->SMTPAuth   = $smtp['auth'];
         $mail->SMTPSecure = $smtp['secure'];
         $mail->Port       = $smtp['port'];
         $mail->Username   = $smtp['sender_address'];
         $mail->Password   = $smtp['password'];

         if (isset($data['email'])) {
           $mail->AddAddress($data['email'], $data['email']);
         } else {
           $mail->AddAddress($smtp['to_address'], $smtp['to_alias']);
         }

         
         if (!empty($smtp['reply_address'])) {
           $mail->AddReplyTo($smtp['reply_address'], Str::replaceIfEmpty($smtp['reply_alias'], $smtp['reply_address']));
         }         
         
         $mail->SetFrom($smtp['sender_address'], $smtp['sender_alias']);


         if(isset($data['cc']) && !empty($data['cc'])) {
           if (!isset($data['ccName']) || empty($data['ccName'])) {
             $data['ccName'] = $data['cc'];
           }
            $mail->AddCC($data['cc'], $data['ccName']);
         } else {
          if (!empty($smtp['cc'])) {
            if (empty($smtp['ccName'])) {
            $smtp['ccName'] = $smtp['cc'];
            }
           $mail->AddCC($smtp['cc'], $smtp['ccName']);
          }           
         }         

         
         if (!empty($smtp['bcc'])) {
           $mail->AddBCC($smtp['bcc'], $smtp['bccName']);
         }
         
         
         if (isset($data['subject'])) {
           $mail->Subject = $data['subject'];
         }
         
         $mail->AltBody = 'Activate the HTML view, in order to view the message correctly.'; // optional - MsgHTML will create an alternate automatically
         $mail->MsgHTML($data['message']);
         
         if (isset($data['attachment']) && !empty($data['attachment'])) {
           //attachment must be the path to resource
           
           if (isset($data['attachment_with_root']) && $data['attachment_with_root'] == true) {
             //path must include the real root
             $mail->AddAttachment($data['attachment']); 
           } else {
             //path is relative to project, no need for actual root
             $mail->AddAttachment($siteInfo['root'].'/'.$data['attachment']); 
           }
           
         }

      }
      catch (phpmailerException $e) {  echo $e->errorMessage(); }   //Pretty error messages from PHPMailer

      if(!$mail->Send()){
         return false;
      } else {
         return true;
      }
  }
  
}