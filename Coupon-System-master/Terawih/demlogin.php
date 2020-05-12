<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>System Coupon UiTM</title>
    <link rel="stylesheet" href= "stylelogin.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  </head>
  <body>

    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid" >
      <div class="container">
        <h1>System Coupon UiTM</h1>
      </div>
    </div>

    <!-- table  -->
    <div class="meow">
      <p class = "login" > DEM LOGIN </p>
        <form action = "pdemlogin.php" method = "post" id = "login" name = "login" target = "_self">
          <div style = "text-align: center;">
            <label for="fname">Username</label><br/>
            <input style = "border-color: black;" type="text" id="studno" name="studno" placeholder="Student ID"><br>
            <label for="lname">Password</label><br/>
            <input style = "border-color: black;" type="password" id="password" name="password" placeholder="Password"><br><br>
            <input type="submit" value="Login" class="btn btn-primary">
          </div>
        </form>
        <br />
        <form action = "index.php" style = "text-align: center;">
          <button type="submit" class="btn btn-default"> Back</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
