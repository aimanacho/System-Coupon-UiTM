<?php
session_start();
if ( !isset($_SESSION['userlogged']) || $_SESSION['userlogged'] != 1)
{
  header("Location: index.php");
}
include("updateeventstatus.php");
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
    <?php  include("bar.php"); ?>
  <!-- table -->
  <div class="content">
    <div class="dashboard">
      <div class="col-sm-10">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Upcoming Events</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
                $sqldate = "SELECT CURRENT_DATE() as currentdate";
                $result = mysqli_query($conn, $sqldate);
                $t = mysqli_fetch_assoc($result);
                $currentdate = $t['currentdate'];
                $sql = "SELECT * FROM events WHERE eventstatus = '2' ORDER BY eventdate DESC LIMIT 5";
                $result = mysqli_query($conn, $sql);
                while ($x = mysqli_fetch_assoc($result))
                {
                  $date = $x['eventdate'];
                  $eventname = $x['eventname'];
                  echo "<td style = padding:2px;font-size:16px;>
                 <p>".$x["eventname"]."</p>
                  <p>".date("jS M Y",strtotime($x["eventdate"]))."</p>
                  </td>
                  </tr>";
                }
              ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="dashboard">
      <div class="col-sm-10">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Recent Activity</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
                $sql = "SELECT * FROM events WHERE eventstatus = '1' ORDER BY timechange DESC LIMIT 5";
                $result = mysqli_query($conn, $sql);
                while ($x = mysqli_fetch_assoc($result))
                {
                  $date = $x['eventdate'];
                  $eventname = $x['eventname'];
                  echo "<td style = padding:2px;font-size:16px;>
                 <p>".$x["eventname"]."</p>
                  <p>".date("jS M Y",strtotime($x["eventdate"]))."</p>
                  </td>
                  </tr>";
                }
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<!-- script -->
<script>
  /*dropdown*/
  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;

  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block")
      dropdownContent.style.display = "none";
    else
      dropdownContent.style.display = "block";
    });
  }



</script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
