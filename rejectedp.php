<?php
  include ("connection.php");
    session_start();
    $remarks = $_POST['remarks'];
    $eventstatus = '3';

    $sql = "UPDATE events SET remarks = '".$remarks."', eventstatus= '".$eventstatus."' WHERE eventcode = '".$_SESSION['eventcode']."'";
    mysqli_query($conn, $sql);
    echo "<script language = 'javascript'>alert('Event Rejected!');window.location='dashboard.php';</script>";
 ?>
