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
    echo "<script language = 'javascript'>alert('Registration is success.');window.location='dashboard.php';</script>";
 ?>
