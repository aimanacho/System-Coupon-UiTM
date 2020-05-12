<?php
  include ("connection.php");

    $eventname = $_POST['eventname'];
    $eventvenue = $_POST['eventvenue'];
    $eventdate = $_POST['eventdate'];
    $timestart =  date("H:i", strtotime("$_POST[timestart]"));
    $timeend = date("H:i", strtotime("$_POST[timeend]"));
    $merit = $_POST['eventmerit'];
    $couponq = $_POST['couponq'];
    $eventstatus = $_POST['eventstatus'];
    $clubcode = $_POST['clubcode'];


    $sql = "INSERT INTO events (eventname, eventvenue, eventdate, timestart, timeend, meritE, couponq, eventstatus, clubCode) VALUES
    ('".$eventname."', '".$eventvenue."','".$eventdate."','".$timestart."','".$timeend."','0','0','1', '".$clubcode."')";

    mysqli_query($conn, $sql);
   // echo "<script language = 'javascript'>alert('Registration is success.');window.location='dashboard.php';</script>";
 ?>
