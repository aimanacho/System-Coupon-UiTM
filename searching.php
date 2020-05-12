<?php
    include ("connection.php");
    $matricno = mysqli_real_escape_string($conn, $_POST['matricno']);
    $eventcode = $_POST['eventcode'];
    $merit = $_POST['meritE'];
    $sql = "UPDATE student, events SET student.merit = '".$merit."' WHERE eventcode = '".$eventcode."' AND matricNo = '".$matricno."'";
    $qry = mysqli_query($conn, $sql);
    echo "UPDATED!";
    header("coupon.php");
 ?>
