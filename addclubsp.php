<?php
  include ("connection.php");
    session_start();
    $clubname = $_POST['clubname'];
    $clubcode = $_POST['clubcode'];
    $dempass = $_POST['dempass'];
    $demid = $_POST['demid'];

    $sql = "INSERT INTO clubs (clubCode, clubName) VALUES ('".$clubcode."', '".$clubname."')";
    mysqli_query($conn, $sql);
    $sql = "INSERT INTO dem (demID, demPass, clubCode, userlevelid) VALUES ('".$demid."', '".$dempass."', '".$clubcode."', '1')";
    mysqli_query($conn, $sql);
    echo "<script language = 'javascript'>alert('New club has been added!');window.location='dashboard.php';</script>";
 ?>
