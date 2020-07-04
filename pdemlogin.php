<?php
//save this file as plogin.php
include("connection.php");

$studno = mysqli_real_escape_string($conn, $_POST['studno']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM dem d JOIN clubs c on c.clubCode = d.clubCode WHERE demID = '".$studno."' AND demPass = '".$password."'";
$qry = mysqli_query($conn, $sql);
$row = mysqli_num_rows($qry);

if ( $row > 0)
{
  $r = mysqli_fetch_assoc($qry);
  session_start();
  $_SESSION['userlogged'] = 1;
  $_SESSION['studentno'] = $studno;
  $_SESSION['studentname'] = $r['studentname'];
  $_SESSION['userlevelid'] = $r['userlevelid'];
  $_SESSION['clubName'] = $r['clubName'];
  $_SESSION['clubCode'] = $r['clubCode'];
  $_SESSION['alert'] = 0;

  header("Location: dashboard.php");
}
else
{
  echo "<script language ='javascript'> alert('User does not exist.');window.location='demlogin.php';</script>";
}
 ?>
