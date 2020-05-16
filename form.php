<?php
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
$mail ->SetFrom('warizupguys@gmail.com');
$mail ->Subject = 'Hello World';
$mail ->Body = 'A test email!';
$mail ->AddAddress('warizupguys@gmail.com');

$mail->Send()

 ?>
