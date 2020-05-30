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
  </head>
  <body>
    <!--process -->
<?php
    include("connection.php");
     if (array_key_exists('searchmatric',$_POST))
     {
       searchmatric();
     }

     function checkAttendance($conn, $matricno)
     {
       $found = false;
       $foundM = "SELECT matricno from attendance WHERE matricno = '".$matricno."' AND eventcode = '".$_SESSION["eventcode"]."'";
       $resultF = mysqli_query($conn, $foundM);
       $row = mysqli_num_rows($resultF);
       if ( $row > 0)
       {
         $found = true;
       }
       return $found;
     }

     function checkStudent($conn, $matricno)
     {
       $found = false;
       $foundM = "SELECT matricNo from student WHERE matricNo = '".$matricno."'";
       $resultF = mysqli_query($conn, $foundM);
       $row = mysqli_num_rows($resultF);
       if ( $row > 0)
       {
         $found = true;
       }
       return $found;
     }
     function searchmatric()
     {
       include("connection.php");
       $matricno = $_POST['matricno'];
       //$meritE = $_SESSION['meritE'];
       $eventcode = $_SESSION['eventcode'];
       //found matric no
       if (checkStudent($conn, $matricno)== true)
       {
         //coupon quantity
         $couponQ = "SELECT * FROM events WHERE eventcode = '".$eventcode."'";
         $resultC = mysqli_query($conn, $couponQ);
         $c = mysqli_fetch_assoc($resultC);
         $coupon = $c['couponq'];
         //coupon quantity used
         $couponused = $c['couponused'];
         //validation if coupon is still not fully used
          if  ($couponused < $coupon)
          {
              //if matricno does not have data inside table attendance
              if (checkAttendance($conn, $matricno) == true)
              {
                echo "<script language = 'javascript'>alert('Student already attend!');window.location='coupon.php';</script>";
              }
              else
              {
                $repeats = 1;
                $couponused = $couponused  + 1;
                $sqlstudent = "INSERT INTO attendance (matricno, eventcode) VALUES ('".$matricno."', '".$eventcode."')";
                $result = mysqli_query($conn, $sqlstudent);
                $sqlevent = "UPDATE events SET couponused = '".$couponused."' WHERE eventcode = '".$eventcode."'";
                $result = mysqli_query($conn, $sqlevent);
                echo "<script language = 'javascript'>alert('Attendance accepted!');window.location='coupon.php';</script>";
              }
          }
          else
          {
            echo "<script language = 'javascript'>alert('Quantity coupon already maxed out!');window.location='coupon.php';</script>";
          }
       }
       else
       {
          echo "<script language ='javascript'> alert('Student not found!');window.location='coupon.php';</script>";
       }

      }
//post value/ test
    if ( $_SESSION['test'] == 0)
    {
      //merit
      $meritE = $_POST['meritE'];
      $_SESSION['meritE'] = $meritE;
      //eventcode
      $eventcode = $_POST['eventcode'];
      $_SESSION['eventcode'] = $eventcode;
      $_SESSION['test'] = 1;
    }
    // for quantity coupon left purposes
      //coupon quantity
      $couponQ = "SELECT couponq FROM events WHERE eventcode = '".$_SESSION["eventcode"]."'";
      $resultC = mysqli_query($conn, $couponQ);
      $c = mysqli_fetch_assoc($resultC);
      $coupon = $c['couponq'];
      //coupon quantity used
      $couponU = "SELECT couponused FROM events WHERE eventcode = '".$_SESSION["eventcode"]."'";
      $resultCU = mysqli_query($conn, $couponU);
      $cu = mysqli_fetch_assoc($resultCU);
      $couponused = $cu['couponused'];
      $_SESSION['couponleft'] = ($coupon - $couponused);
      //$couponleft = $coupon - $couponused;
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
       <br>
       <p> Coupon Quantity left: <?php echo $_SESSION['couponleft']; ?> </p>
     </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
