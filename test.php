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
      <?php
        $datetime = $_POST['datetime'];
        $eventdate = $_POST['eventdate'];
        $timestart =  date("H:i:s", strtotime("$_POST[timestart]"));
        $date = new DateTime($eventdate);
        $time = new DateTime($timestart);

        $merge = new DateTime($date->format('Y-m-d') .' ' .$time->format('H:i'));
        echo $merge->format('Y-m-d H:i:s');
        echo "<br>";
        echo $eventdate;
        echo "<br>";
        echo $timestart;
       ?>



      <!-- script -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
    </body>
  </html>
