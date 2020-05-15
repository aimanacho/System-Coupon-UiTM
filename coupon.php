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
       $repeatsS = "SELECT repeats FROM student WHERE matricNo = '".$matricno."'";
       $resultR = mysqli_query($conn, $repeatsS);
       $resultRow = mysqli_num_rows($resultR);
       $r = mysqli_fetch_assoc($resultR);
       $repeats = $r['repeats'];
       if ( $repeats == 0)
       {
         $repeats = 1;
         $sql = "UPDATE student SET merit = '".$meritE."', repeats = '".$repeats."' WHERE matricNo = '".$matricno."'";
         $result = mysqli_query($conn, $sql);
         echo "<script language = 'javascript'>alert('Attendance accepted!');window.location='coupon.php';</script>";
       }
       else
         echo "<script language = 'javascript'>alert('Student already attend!');window.location='coupon.php';</script>";
     }

     ?>
  </head>
  <body>
    <!-- Countdown -->
    <p id="ended"></p>
    <script>

// Set the date we're counting down to
var countDownDate = new Date("May 15, 2020 22:43:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
  document.getElementById("ended").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is over, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("ended").innerHTML = "Event has ended!";
    header("location:SystemCoupon/attendance.php");
  }
}, 1000);
</script>
    <?php
    if ( $_SESSION['test'] == 0)
    {
      $meritE = $_POST['meritE'];
      $_SESSION['meritE'] = $meritE;
       echo $_SESSION['meritE'];
        $_SESSION['test'] = 1;
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
  </body>
</html>
