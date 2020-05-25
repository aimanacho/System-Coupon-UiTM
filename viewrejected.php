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
      <a href="attendance.php" class = "btn">Attendance</a>
      <a class= "dropdown-btn btn active" style = "font-size: 25px;">Events
        <i class = "fa fa-caret-down"></i>
      </a>
      <div class = "dropdown-container" >
        <a href= "createevent.php" style= "text-align: left;font-size: 18px;">Create events</a>
        <a href= "vieweventdem.php" style= "text-align: left;font-size: 18px;">View events</a>
      </div>
    </div>

    <!-- content-->
    <div class = "content">
      <form action = "vieweventdem.php" style = "text-align: center;">
        <button type="submit" class="btn btn-primary"> Back</button>
      </form>
      <p style = "text-align: center;font-size: 30px;"><b>Status of Events</b></p><br>
      <p style = "text-align: center;font-size: 23px;">Event details</p><br>
      <?php
        include ("connection.php");
        if ($_SESSION['norepeat']==0)
        {
            $eventcode =  $_POST['eventcode'];
            $_SESSION['eventcode'] = $eventcode;
            $_SESSION['norepeat'] = 1;
        }
        $sql = "SELECT * from events e JOIN clubs c ON c.clubCode = e.clubCode WHERE eventcode = '".$_SESSION['eventcode']."'";
        $result = mysqli_query($conn, $sql);
          if ($row = mysqli_fetch_assoc($result))
          {
            echo "<p> Event Name:".$row["eventname"]."</p>";
            echo "<p> Event Venue:".$row["eventvenue"]."</p>";
            echo "<p> Event Date:".date("jS M Y",strtotime($row["eventdate"]))."</p>";
            echo "<p> Event Time Start:".date("H:i",strtotime($row["timestart"]))."</p>";
            echo "<p> Event Times End:".date("H:i",strtotime($row["timeend"]))."</p>";
          //  echo "<p> Merit:".$row["meritE"]."</p>";
            //echo "<p> Coupon Quantity Given:".$row["couponq"]."</p>";
            echo "<p> Organizer:".$row["clubName"]."</p>";
            echo "<p> Remarks:".$row["remarks"]."</p>";
            $_SESSION['eventcode'] = $row["eventcode"];
          }
        ?>
      <!-- script -->
      <script>
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;
          for (i = 0; i < dropdown.length; i++)
        {
          dropdown[i].addEventListener("click", function()
          {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block")
            {
            dropdownContent.style.display = "none";
              }
            else
            {
              dropdownContent.style.display = "block";
            }
            });
        }
        $("button").click(function() {
          var fired_button = $(this).val();
          alert(fired_button);
        });
        </script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>