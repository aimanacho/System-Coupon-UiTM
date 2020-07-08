<?php
  include ("connection.php");
    session_start();
    $eventname = $_POST['eventname'];
    $eventvenue = $_POST['eventvenue'];
    $eventdate = $_POST['eventdate'];
    $timestart =  date("H:i", strtotime("$_POST[timestart]"));
    $timeend = date("H:i", strtotime("$_POST[timeend]"));
    $combinedstart = date('Y-m-d H:i:s', strtotime("$eventdate $timestart"));
    $combinedend = date('Y-m-d H:i:s', strtotime("$eventdate $timeend"));
    $merit = 0;
    $couponq = 0;
    $eventstatus = 1;
    $clubCode = $_SESSION['clubCode'];
    $clubName = $_SESSION['clubName'];


    $sql = "INSERT INTO events (eventname, eventvenue, eventdate, timestart, timeend, merit, couponq, eventstatus, clubCode) VALUES
    ('".$eventname."', '".$eventvenue."','".$eventdate."','".$combinedstart."','".$combinedend."','".$merit."','".$couponq."','".$eventstatus."', '".$clubCode."')";

    mysqli_query($conn, $sql);

    //send email
    require ('includes/PHPMailer.php');
    require ('includes/SMTP.php');
    require ('includes/Exception.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    $mail = new PHPMailer();
    $mail ->isSMTP();
    $mail ->SMTPAuth = true;
    $mail ->SMTPSecure = 'ssl';
    $mail ->Host = 'smtp.gmail.com';
    $mail ->Port = '465';
    $mail ->isHTML();
    $mail ->Username = 'eventalert.systemcouponuitmr@gmail.com';
    $mail ->Password = 'scuitmr2020';
    $mail ->SetFrom('eventalert.systemcouponuitmr@gmail.com');
    $mail ->Subject = 'A new submission from '.$clubCode.'';
    $mail ->Body = ''.$clubName.' has created a program! Please check our website [Login HEP -> Events -> Pending Events]';
    $mail ->AddAddress('hepuitmr@gmail.com');
    $mail->Send();

    echo "<script language = 'javascript'>alert('Registration is success.');window.location='dashboard.php';</script>";
 ?>
