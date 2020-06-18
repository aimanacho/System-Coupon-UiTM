<?php
  include ("connection.php");
    session_start();
    $eventname = $_POST['eventname'];
    $eventvenue = $_POST['eventvenue'];
    $eventdate = $_POST['eventdate'];
    $timestart =  date("H:i", strtotime("$_POST[timestart]"));
    $timeend = date("H:i", strtotime("$_POST[timeend]"));
    $merit = 0;
    $couponq = 0;
    $eventstatus = 1;
    $clubCode = $_SESSION['clubCode'];



    $sql = "INSERT INTO events (eventname, eventvenue, eventdate, timestart, timeend, meritE, couponq, eventstatus, clubCode) VALUES
    ('".$eventname."', '".$eventvenue."','".$eventdate."','".$timestart."','".$timeend."','".$merit."','".$couponq."','".$eventstatus."', '".$clubCode."')";

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
    $mail ->Username = 'aimanachotest@gmail.com';
    $mail ->Password = 'test1201';
    $mail ->SetFrom('aimanachotest@gmail.com');
    $mail ->Subject = 'A new submission from student';
    $mail ->Body = ''.$clubCode.' has created program! Please check our website [Login HEP -> Events -> Pending Events]';
    $mail ->AddAddress('aimanachotest@gmail.com');
    $mail->Send();

    echo "<script language = 'javascript'>alert('Registration is success.');window.location='dashboard.php';</script>";
 ?>
