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
      <form method = "post">
        <input type ="text" id = "matricno" name = "matricno" />
        <button type="submit" name = "searchmatric" onclick = "searchmatric()"><i class="fa fa-search"></i></button>
      </form>


      <?php
      include("connection.php");
      if (array_key_exists('searchmatric',$_POST))
       {
         searchmatric();
       }
       //check if matric number exist or not
       function checkStudent($conn, $matricno)
       {
         $found = false;
         $foundM = "SELECT matricNo from student WHERE matricNo = '".$matricno."'";
         $resultF = mysqli_query($conn, $foundM);
         $row = mysqli_num_rows($resultF);
         if ( $row > 0)
         {
           $found = true;
         }
         return $found;
       }

       function searchmatric()
       {
         include("connection.php");
         $matricno = $_POST['matricno'];
         //sql statement
         if (checkStudent($conn, $matricno)== true)
         {
           //coupon quantity
           $couponQ = "SELECT * FROM student WHERE matricNo = '".$matricno."'";
           $resultC = mysqli_query($conn, $couponQ);
           while ($row = mysqli_fetch_assoc($resultC))
           {
             echo "<table class=table table-striped>
               <thead>
                 <tr>
                   <th>ID</th>
                   <th>Name</th>
                   <th>Semester</th>
                 </tr>
               </thead>
               <tbody>";
                 echo "<form action = student.php method = post >";
                 echo "<tr>";
                 echo "<input type = 'hidden' name = 'matricNo' value = '".$row['matricNo']."'/>";
                 echo "<td><button style = background-color:transparent;outline:none;border:none;>".$row["matricNo"]."</button></td>";
                 echo "<td>".$row["studentname"]."</td>";
                 echo "<td>".$row["sem"]."</td>";
                 echo "</tr>";
                 echo "</form>";
          }
             echo "</tbody>
            </table>";
           }
         else
         {
            echo "<script language ='javascript'> alert('meow!');window.location='test.php';</script>";
         }
       }
     ?>
      <!-- script -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
    </body>
  </html>
