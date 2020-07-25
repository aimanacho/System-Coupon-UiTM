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
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
  </head>
  <body>

<!-- topbar-->
    <ul class="topnav" id= "main">
      <li class="right"><a href="logout.php">Logout</a></li>
    </ul>

    <!-- sidebar-->
    <div class="sidenav">
    <img src = "uitm.jpg"/>
    <a href="dashboard.php" class = "btn"> Dashboard</a>
    <a href="clubs.php" class = "btn active">Clubs</a>
    <a href="studentinfo.php" class = "btn">Student Info</a>
    <a class= "dropdown-btn btn" style = "font-size: 25px;">Events
      <i class = "fa fa-caret-down"></i>
    </a>
    <div class = "dropdown-container" >
      <a href= "viewevent.php" style= "text-align: left;font-size: 18px;">Upcoming events</a>
      <a href= "pendingevent.php" style= "text-align: left;font-size: 18px;">Pending events</a>
      <a class = "btn" href= "historyevent.php" style= "text-align: left;font-size: 18px;">History events</a>
    </div>
    <a href="report.php" class = "btn">Report</a>
    </div>

<!-- content -->
<div class = "content">
  <form action = "clubs.php">
    <button type="submit" class="button"> Back</button>
  </form>
</div>
      <p class = "content"><b>Delete Club</b></p>
      <form action = "deleteclubsp.php" method = "post"  target = "_self">
        <table class="table table-bordered table-striped" id= "tablemeow">
          <tbody>
            <?php
              include ("connection.php");
              if ( $_SESSION['norepeats'] == 0)
              {
                  $clubCode = $_POST['clubCode'];
                  $_SESSION['clubCode'] = $clubCode;
                  $_SESSION['norepeats'] = 1;
              }
              $sql = "SELECT * FROM clubs WHERE clubCode = '".$_SESSION['clubCode']."'";
              $result = mysqli_query($conn, $sql);
              if ($row = mysqli_fetch_assoc($result))
              {
                $_SESSION['clubname'] = $row['clubName'];
                ?>
            <tr>
              <td style = "width:15%;">Club name: </td>
              <td> <?php echo $_SESSION['clubname']; ?></td>
            </tr>
            <tr>
              <td style = "width:15%;">Club code: </td>
              <td> <?php echo $_SESSION['clubCode']; ?></td>
            </tr>
          </tbody>
        </table>
        <input style="margin-left:230px;"type="submit" name = "delete" id = "delete" value="Delete" class="btn btn-secondary">
      </form>

      <?php
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
  </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
