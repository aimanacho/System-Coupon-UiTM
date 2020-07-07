<?php
require_once __DIR__ . '/vendor/autoload.php';

session_start();

//Grab variables


//Create new pdf instance
$mpdf = new \Mpdf\Mpdf();


//Create pdf
$data = '';

$data .= '<h1>College Qualification</h1>';

//Add Data

include("connection.php");
$sql = "SELECT *, sum(e.meritE) as totalmerit from student s join attendance a on s.matricNo=a.matricno join events e on e.eventcode = a.eventcode Group by s.matricNo ORDER BY s.matricNo, s.studentname, s.sem";
$result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result))
  {

    $data .= "<br><strong>Matric No : </strong></br>";
    $data .= $row["matricNo"];
    $data .= "<br><strong>Student Name : </strong></br>";
    $data .= $row["studentname"];
    $data .= "<br><strong>Semester : </strong></br>";
    $data .= $row["sem"];
    $data .= "<br><strong>Total Merit : </strong></br>";
    $data .= $row['totalmerit'];
    $data .= "<br><strong>Status : </strong></br>";
    $data .="Taktau lagi saje pancing xD";
    $data .= "<br> </br>";


  }

//Write pdf
$mpdf->WriteHTML($data);

//Output to browser
$mpdf->Output('report.pdf', 'D');

?>
