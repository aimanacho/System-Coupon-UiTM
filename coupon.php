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
       //repeat
       $repeatsS = "SELECT repeats FROM student WHERE matricNo = '".$matricno."'";
       $resultR = mysqli_query($conn, $repeatsS);
       $r = mysqli_fetch_assoc($resultR);
       $repeats = $r['repeats'];
       //merit
       $meritS = "SELECT merit FROM student WHERE matricNo = '".$matricno."'";
       $resultM = mysqli_query($conn, $meritS);
       $m = mysqli_fetch_assoc($resultM);
       $merit = $m['merit'];
       $merit = $merit + $meritE;
       //coupon quantity
       $couponQ = "SELECT couponq FROM events WHERE eventcode = '".$eventcode."'";
       $resultC = mysqli_query($conn, $couponQ);
       $c = mysqli_fetch_assoc($resultC);
       $coupon = $c['couponq'];
         if  ($_SESSION['coupon'] < $coupon)
         {
           if ( $repeats == 0)
           {
             $repeats = 1;
             $sql = "UPDATE student SET merit = '".$merit."', repeats = '".$repeats."' WHERE matricNo = '".$matricno."'";
             $result = mysqli_query($conn, $sql);
             $_SESSION['coupon'] = $_SESSION['coupon'] + 1;
             echo "<script language = 'javascript'>alert('Attendance accepted!');window.location='coupon.php';</script>";
           }
           else
              echo "<script language = 'javascript'>alert('Student already attend!');window.location='coupon.php';</script>";
        }
        else
        {
          echo "<script language = 'javascript'>alert('Quantity coupon already maxed out!');window.location='coupon.php';</script>";
        }
      }
?>

  </head>
  <body>
    <?php
    if ( $_SESSION['test'] == 0)
    {
      //merit
      $meritE = $_POST['meritE'];
      $_SESSION['meritE'] = $meritE;
      echo $_SESSION['meritE'];
      //eventcode
      $eventcode = $_POST['eventcode'];
      $_SESSION['eventcode'] = $eventcode;
      echo $_SESSION['eventcode'];
      $_SESSION['test'] = 1;
    }
    else
    {
      echo $_SESSION['meritE'];
      echo $_SESSION['eventcode'];
    }
    //time
    $sqlE = "SELECT CURRENT_TIME() as cTime, timeend FROM events WHERE eventcode = '".$_SESSION['eventcode']."'";
    $resultT = mysqli_query($conn, $sqlE);
    $t = mysqli_fetch_assoc($resultT);
    if ($t['cTime'] > $t["timeend"])
    {
      echo "<script language = 'javascript'>alert('Event has ended!');window.location='attendance.php';</script>";
           $sqlUpdate = "UPDATE events SET eventstatus = '4' WHERE eventcode = '".$_SESSION['eventcode']."'";
           $result = mysqli_query($conn, $sqlUpdate);
           mysqli_query($conn,$sqlUpdate);
    }
     ?>
     <form method = "post" style = "text-align:center;margin-top: 200px;">
       <lable>Enter Matric No: </lable>
       <input type ="text" id = "matricno" name = "matricno" />
       <button type="submit" class="btn btn-info" name = "searchmatric" onclick = "searchmatric()">Enter</button>
     </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
