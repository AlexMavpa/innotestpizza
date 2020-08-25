<?php
require_once('class.phpmailer.php');
                $mailsend = new PHPMailer();
                $name='InnoTestPizza';
                $from='no-reply@innotestpizza.xyz';
                $body = $mess2;
               $body = eregi_replace("[\]",'',$body);              
$mailsend->CharSet = "utf-8";
$mailsend->SetFrom($from, $name);
$mailsend->AddReplyTo($from, $name);
$mailsend->Subject = $subject;
$mailsend->MsgHTML($body);
$address = "no-reply@innotestpizza.xyz";                              
$mailsend->AddAddress($mail);                     

        if($sendemail != 'No'){
          
              if (!$mailsend->Send()) die ('Nothing: '.$mailsend->ErrorInfo);
            // echo "E-mail was sent";
        }
 ?>