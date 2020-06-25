<?php
//save this file as plogin.php
include("connection.php");

$studno = mysqli_real_escape_string($conn, $_POST['studno']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM hep WHERE hepID = '".$studno."' AND hepPass = '".$password."'";
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
  $_SESSION['userlevelname'] = $r['userlevelname'];
  $_SESSION['alert'] = 0;

  header("Location: dashboard.php");
}
else
{
  echo "<script language ='javascript'> alert('User does not exist.');window.location='heplogin.php';</script>";
}
 ?>
