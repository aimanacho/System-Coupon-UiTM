<?php
session_start();
if ( !isset($_SESSION['userlogged']) || $_SESSION['userlogged'] != 1)
{
header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <link rel="stylesheet" href= "styledashboardsidebar.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <!-- topbar-->
  <ul class="topnav" id= "main">
    <li class="right"><a href="index.php">Logout</a></li>
  </ul>

  <!-- sidebar-->
<div class="sidenav">
  <img src = "uitm.jpg"/>
  <a href="dashboard.php" class = "btn"> Dashboard</a>
  <a href="clubs.php" class = "btn">Clubs</a>
  <a href="studentinfo.php" class = "btn active">Student Info</a>
  <a class= "dropdown-btn btn" style = "font-size: 25px;">Events
    <i class = "fa fa-caret-down"></i>
  </a>
  <div class = "dropdown-container" >
    <a href= "viewevent.php" style= "text-align: left;font-size: 18px;">View events</a>
    <a href= "pendingevent.php" style= "text-align: left;font-size: 18px;">Pending events</a>
  </div>
  <a href="report.php" class = "btn">Report</a>
</div>

<!-- content -->
<div class = "content">
  <form action = "studentinfo.php" style = "text-align: center;">
    <button type="submit" class="btn btn-primary"> Back</button>
  </form>
  <p style = "text-align: center;font-size: 30px;"><b>Student Information</b></p><br>
  <?php
    include ("connection.php");
    $matricNo =  $_POST['matricNo'];
    $sql = "SELECT * from student WHERE matricNo = '".$matricNo."'";
    $result = mysqli_query($conn, $sql);
      if ($row = mysqli_fetch_assoc($result))
      {
        echo "<p> Student Name:".$row["studentname"]."</p>";
        echo "<p> Matric No:".$row["matricNo"]."</p>";
        echo "<p> Semester:".$row["sem"]."</p>";
        echo "<p> Total Merit:".$row["merit"]."</p>";
      }
    ?>
