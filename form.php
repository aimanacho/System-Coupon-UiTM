<?php
//send email
require_once('PHPMailerAutoload.php');
$mail = new PHPMailer();
$mail ->isSMTP();
$mail ->SMTPAuth = true;
$mail ->SMTPSecure = 'ssl';
$mail ->Host = 'smtp.gmail.com';
$mail ->Port = '465';
$mail ->isHTML();
$mail ->Username = 'aimanachotest@gmail.com';
$mail ->Password = 'test1201';
$mail ->SetFrom('aimanachotest@gmail.com');
$mail ->Subject = 'A new submission from student';
$mail ->Body = ' Aiman has created program! Please check our website [Login HEP -> Events -> Pending Events].';
$mail ->AddAddress('aimanachotest@gmail.com');
$mail->Send();

 ?>
