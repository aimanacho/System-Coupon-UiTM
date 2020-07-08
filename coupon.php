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
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
  </head>
  <body style = "background-color: white;">
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
       $sqlE = "SELECT CURRENT_TIME() as cTime, timeend FROM events WHERE eventcode = '".$_SESSION['eventcode']."'";
       $resultT = mysqli_query($conn, $sqlE);
       $t = mysqli_fetch_assoc($resultT);
       if ($t['cTime'] > $t["timeend"])
       {
         echo "<script language = 'javascript'>alert('Event has ended!');window.location='attendance.php';</script>";
              $sqlUpdate = "UPDATE events SET eventstatus = '4' WHERE eventcode = '".$_SESSION['eventcode']."'";
              $result = mysqli_query($conn, $sqlUpdate);
       }
       else
       {
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
           $sql2 = "SELECT *, COUNT(eventcode) AS totalattend FROM attendance WHERE eventcode = '".$_SESSION['eventcode']."'";
           $result2 = mysqli_query($conn, $sql2);
           $row2 = mysqli_fetch_assoc($result2);
           //coupon quantity used
           $totalattend = $row2['totalattend'];
           $diff = $coupon - $totalattend;
           //validation if coupon is still not fully used
            if  ($totalattend < $coupon)
            {
                //if matricno does not have data inside table attendance
                if (checkAttendance($conn, $matricno) == true)
                {
                  echo "<script language = 'javascript'>alert('Student already attend!');window.location='coupon.php';</script>";
                }
                else
                {
                  $repeats = 1;
                  $sqlstudent = "INSERT INTO attendance (matricno, eventcode) VALUES ('".$matricno."', '".$eventcode."')";
                  $result = mysqli_query($conn, $sqlstudent);
                  echo "<script language = 'javascript'>alert('Attendance accepted!');window.location='coupon.php';</script>";
                }
            }
            if ($diff == 0)
            {
              $sqlUpdate = "UPDATE events SET eventstatus = '4' WHERE eventcode = '".$_SESSION['eventcode']."'";
              $result = mysqli_query($conn, $sqlUpdate);
              echo "<script language = 'javascript'>alert('Quantity coupon already maxed out!');window.location='dashboard.php';</script>";
            }
         }
         else
         {
            echo "<script language ='javascript'> alert('Student not found!');window.location='coupon.php';</script>";
         }
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
      $couponQ = "SELECT * FROM events WHERE eventcode = '".$_SESSION["eventcode"]."'";
      $resultC = mysqli_query($conn, $couponQ);
      $c = mysqli_fetch_assoc($resultC);
      $coupon = $c['couponq'];
      $sql2 = "SELECT *, COUNT(eventcode) AS totalattend FROM attendance WHERE eventcode = '".$_SESSION['eventcode']."'";
      $result2 = mysqli_query($conn, $sql2);
      $row2 = mysqli_fetch_assoc($result2);
      $totalattend = $row2['totalattend'];
      $_SESSION['couponleft'] = ($coupon - $totalattend);
      $eventnametmp = $c['eventname'];
      //$couponleft = $coupon - $couponused;
    //time
    $sqlE = "SELECT CURRENT_TIME() as cTime, timeend FROM events WHERE eventcode = '".$_SESSION['eventcode']."'";
    $resultT = mysqli_query($conn, $sqlE);
    $t = mysqli_fetch_assoc($resultT);
    if ($t['cTime'] > $t["timeend"])
    {
      $sqlUpdate = "UPDATE events SET eventstatus = '4' WHERE eventcode = '".$_SESSION['eventcode']."'";
      mysqli_query($conn,$sqlUpdate);
      echo "<script language = 'javascript'>alert('Event has ended!');window.location='attendance.php';</script>";

    }

?>
<!-- topbar-->
<ul class="topnav" id= "main">
  <li class="right"><a href="attendance.php">Back</a></li>
  <p style = "text-align:center;margin-top:15px;color:white;"> <?php echo $eventnametmp; ?></p>
</ul>

  <div class = "couponform">
     <form method = "post" style = "margin-top:25px;">
         <lable style = "font-size: 28px;"><strong>Enter Matric Number</strong></lable> </br></br>
         <input style = "width:100%;text-align:center;" type ="text" id = "matricno" name = "matricno" maxlength="10" /> </br> </br>
         <button style = "width:100%;" type="submit" class="btn btn-primary" name = "searchmatric" onclick = "searchmatric()">Enter</button><br> </br>
         <p style = "font-size: 25px;"> Coupon quantity left: <?php echo $_SESSION['couponleft']; ?> </p>
     </form>
   </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
