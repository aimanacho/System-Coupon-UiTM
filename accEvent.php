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
    <a href="studentinfo.php" class = "btn">Student Info</a>
    <a class= "dropdown-btn btn active" style = "font-size: 25px;">Events
      <i class = "fa fa-caret-down"></i>
    </a>
    <div class = "dropdown-container" >
      <a href= "viewevent.php" style= "text-align: left;font-size: 18px;">View events</a>
      <a href= "pendingevent.php" style= "text-align: left;font-size: 18px;">Pending events</a>
    </div>
    <a href="report.php" class = "btn">Report</a>
  </div>


  <div class = "content">
    <form action = "accEventp.php" method = "post" id = "login" name = "login" target = "_self">
      <div class = "form-control" style = "text-align: center;">
       <label >Merit: </label>
           <select id="eventmerit" name="eventmerit">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
           </select> <br>
            <label >Coupon Quantity: </label>
               <input type="text" id="couponq" name="couponq"><br>
           <input type="submit" name = "submit" id = "submit" value="Submit" class="btn btn-secondary">
           <?php echo $_SESSION['eventcode'] ?>
      </div>
    </form> <br />
 </div>
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
