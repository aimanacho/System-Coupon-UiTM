<?php
  include ("connection.php");
    session_start();
    $merit = $_POST['eventmerit'];
    $couponq = $_POST['couponq'];
    $eventstatus = '2';

    $sql = "UPDATE events SET merit = '".$merit."', couponq = '".$couponq."', eventstatus= '".$eventstatus."' WHERE eventcode = '".$_SESSION['eventcode']."'";
    mysqli_query($conn, $sql);
    echo "<script language = 'javascript'>alert('Event Accepted.');window.location='dashboard.php';</script>";
 ?>
