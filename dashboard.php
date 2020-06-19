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
    <!-- bar-->
    <?php  include("bar.php"); ?>

<!-- alert -->
<?php if ($_SESSION['userlevelid']== 1){ ?>
  <?php
    if ( $_SESSION['alert'] == 0)
    {
   ?>
   <div class = "alert">
     <div class="alert alert-success alert-dismissible fade in">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       <strong>Welcome <?php echo $_SESSION['clubName']; ?>!</strong>
     </div>
   </div>
   <?php
  $_SESSION['alert'] =1;
  }
   ?>
 <?php } ?>

 <?php if ($_SESSION['userlevelid']== 2){ ?>
   <?php
     if ( $_SESSION['alert'] == 0)
     {
    ?>
    <div class = "alert">
      <div class="alert alert-success alert-dismissible fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Welcome Admin!</strong>
      </div>
    </div>
    <?php
   $_SESSION['alert'] =1;
   }
    ?>
  <?php } ?>



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
