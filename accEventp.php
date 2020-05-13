<?php
  include ("connection.php");
    session_start();
    $merit = $_POST['eventmerit'];
    $couponq = $_POST['couponq'];
    $eventcode = '2';

    $sql = "UPDATE events SET meritE = '".$merit."', couponq = '".$couponq."', eventcode = '".$eventcode."' WHERE eventcode = '".$_SESSION['eventcode']."'";
    mysqli_query($conn, $sql);
    echo "<script language = 'javascript'>alert('Event Accepted.');window.location='dashboard.php';</script>";
 ?>
