<?php session_start(); $_SESSION['alerttmp'] = 0; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>System Coupon UiTM</title>
    <link rel="stylesheet" href= "stylelogin.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body style = "background-color: rgb(163, 194, 194);">
    <!-- table  -->
    <div class = "header">
      <p> System Coupon UiTM</p>
    </div>
    <div class="meow">
        <div class = "loginform">
          <div class = "loginmeow">
            <p style="font-size: 25px;"><b>Login as</b></p>
            <form class = "buttons" action="demlogin.php">
              <input style = "width:100%;font-size: 15px;" type="submit" value="DEM" class="btn btn-primary"> <br><br>
              <input style="font-size: 15px;"type="submit" formaction="heplogin.php" value="HEP" class="btn btn-info">
            </form>
          </div>
        </div>
        <img src = "campus.jpg"/>
        <!-- untuk alert kat dem and hep kalau salah id or password-->
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
