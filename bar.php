<!-- topbar-->
<ul class="topnav" id= "main">
  <li class="right"><a href="logout.php">Logout</a></li>
</ul>

<!-- sidebar-->
<!-- dem-->
<?php if ($_SESSION['userlevelid']== 1){ ?>
  <div class="sidenav" id = "myDIV">
    <img src = "uitm.jpg"/>
    <a href="dashboard.php" class = "btn active"> Dashboard</a>
    <a href="attendance.php" class = "btn">Attendance</a>
    <a class= "dropdown-btn btn" style = "font-size: 25px;">Events
      <i class = "fa fa-caret-down"></i>
    </a>
    <div class = "dropdown-container" >
      <a href= "createevent.php" class= "btn" style= "text-align: left;font-size: 18px;">Create events</a>
      <a href= "vieweventdem.php" class= "btn" style= "text-align: left;font-size: 18px;">View events</a>
    </div>
  </div>
  <?php } ?>

<!-- hep-->
<?php if ($_SESSION['userlevelid']== 2){ ?>
<div class="sidenav" id = "myDIV">
  <img src = "uitm.jpg"/>
  <a href="dashboard.php" class = "btn active"> Dashboard</a>
  <a href="clubs.php" class = "btn">Clubs</a>
  <a href="studentinfo.php" class = "btn">Student Info</a>
  <a class= "dropdown-btn btn" style = "font-size: 25px;">Events
    <i class = "fa fa-caret-down"></i>
  </a>
  <div class = "dropdown-container" >
    <a class = "btn" href= "viewevent.php" style= "text-align: left;font-size: 18px;">Upcoming events</a>
    <a class = "btn" href= "pendingevent.php" style= "text-align: left;font-size: 18px;">Pending events</a>
    <a class = "btn" href= "historyevent.php" style= "text-align: left;font-size: 18px;">History events</a>
  </div>
  <a href="report.php" class = "btn">Report</a>
</div>
<?php } ?>

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
