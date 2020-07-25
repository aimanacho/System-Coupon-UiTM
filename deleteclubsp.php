<?php
  include ("connection.php");
    session_start();

    $sql = "DELETE FROM clubs WHERE clubCode = '".$_SESSION['clubCode']."'";
    mysqli_query($conn, $sql);
    echo "<script language = 'javascript'>alert('Club has been removed!');window.location='dashboard.php';</script>";
 ?>
