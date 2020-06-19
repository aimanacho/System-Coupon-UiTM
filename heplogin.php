<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>System Coupon UiTM</title>
    <link rel="stylesheet" href= "stylelogin.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body style = "background-color: rgb(163, 194, 194);">
    <!-- table  -->
    <div class="meow">
      <div class="loginform">
        <p style="font-size:30px;"> HEP LOGIN </p>
        <form action = "pheplogin.php" method = "post" id = "login" name = "login" target = "_self">
          <div>
            <div class="input-container">
              <i class="fa fa-user icon"></i>
              <input class="input-field" type="text" id="studno" name="studno" placeholder="Student ID" >
            </div>
            <div class="input-container">
              <i class="fa fa-key icon"></i>
              <input class="input-field" type="password" placeholder="Password" id="password" name="password">
            </div>
            <input type="submit" value="Login" class="btn btn-primary">
            <input type="submit" formaction="index.php" value="Back" class="btn btn-info">
          </div>
        </form>
          <div class="alert alert-danger" style="margin-top:50px;width:230px;">
            <strong>You've entered wrong Student ID or Password!</strong>
          </div>
      </div>
        <img src = "campus.jpg"/>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
  </body>
</html>
