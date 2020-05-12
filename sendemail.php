<?php

  require 'PHPMailer/PHPMailerAutoload.php';

  $email = new PHPMailer();
  $email ->isSMTP();
  $email ->Host = 'smtp.gmail.com';
  $email ->Port = '465';
  $email ->SMTPAuth = true;
  $email ->SMTPSecure = 'tls';

  $email ->Username = 'warizupguys1201a@gmail.com';
  $email ->Password = 'tzuyu1201';

  $email ->SetFrom('warizupguys1201a@gmail.com', 'Aiman Mohd Said');
  $email ->addAddress('warizupguys@gmail.com');
  $email ->addReplyTo('warizupguys1201a@gmail.com');

  $email ->isHTML(true);
  $email ->Subject = 'System Coupon UiTM';
  $email ->Body = '<h1>Coupon MEOW</h1>';

  if (!$email -> Send())
  {
    echo "Mail not sent!";
  }
  else
  {
    echo "Mail sent!";
  }


 ?>
