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
    <!-- Countdown -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    p {
      text-align: center;
      font-size: 60px;
      margin-top: 0px;
    }
    </style>
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <?php
    include("connection.php");
     if (array_key_exists('searchmatric',$_POST))
     {
       searchmatric();
     }
     function searchmatric()
     {
       include("connection.php");
       $matricno = $_POST['matricno'];
       $meritE = $_SESSION['meritE'];
       $eventcode = $_SESSION['eventcode'];
       $sqlE = "SELECT CURRENT_TIME() as cTime, timeend FROM events WHERE eventcode = '".$eventcode."'";
       $result = mysqli_query($conn, $sqlE);
       $repeatsS = "SELECT repeats FROM student WHERE matricNo = '".$matricno."'";
       $resultR = mysqli_query($conn, $repeatsS);
       $resultRow = mysqli_num_rows($resultR);
       $r = mysqli_fetch_assoc($resultR);
       $repeats = $r['repeats'];
       while ($row = mysqli_fetch_assoc($result)){
         if($row['cTime']<$row["timeend"]){

               if ($repeats == 0)
               {
                   $repeats = 1;
                   $sql = "UPDATE student SET merit = '".$meritE."', repeats = '".$repeats."' WHERE matricNo = '".$matricno."'";
                   $result = mysqli_query($conn, $sql);
                   echo "<script language = 'javascript'>alert('Attendance accepted!');window.location='coupon.php';</script>";
                 }
                 else
                   echo "<script language = 'javascript'>alert('Student already attend!');window.location='coupon.php';</script>";
             }
         else {
             echo "<script language = 'javascript'>alert('Event has ended!');window.location='attendance.php';</script>";
             $sqlUpdate = "UPDATE events SET eventstatus = '4' WHERE eventcode = '".$eventcode."'";
             $result = mysqli_query($conn, $sqlUpdate);
             mysqli_query($conn,$sqlUpdate);
           }

         }



       }

     ?>
  </head>
  <body>
    <?php
    if ( $_SESSION['test'] == 0)
    {
      $meritE = $_POST['meritE'];
      $_SESSION['meritE'] = $meritE;
       echo $_SESSION['meritE'];
        $_SESSION['test'] = 1;
        $eventcode = $_POST['eventcode'];
      $_SESSION['eventcode'] = $eventcode;
      echo $_SESSION['eventcode'];
    }
    else
    {
      echo $_SESSION['meritE'];
    }
     ?>
     <form method = "post" style = "text-align:center;margin-top: 200px;">
       <lable>Enter Matric No: </lable>
       <input type ="text" id = "matricno" name = "matricno" />
       <button type="submit" class="btn btn-info" name = "searchmatric" onclick = "searchmatric()">Enter</button>
     </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
    <script src="http://www.datejs.com/build/date.js" type="text/javascript"></script>
  </body>
</html>
