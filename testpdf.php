<?php
require('fpdf.php');
include('connection.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Title',1,0,'L');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$sql="SELECT student.matricNo, student.studentname, student.sem, sum(events.meritE) as totalmerit from student join attendance on student.matricNo=attendance.matricno join events on events.eventcode = attendance.eventcode Group by student.matricNo ORDER BY student.matricNo, student.studentname, student.sem";
$result = mysqli_query($conn, $sql);
$number_of_products = mysqli_num_rows($result);

//Initialize the 4 columns
$column_matricNo = "";
$column_name = "";
$column_semester = "";
$column_totalmerit = "";

//For each row, add the field to the corresponding column
if(mysqli_num_rows($result)>0)
{
    while ($row = mysqli_fetch_assoc($result)){
    $matricNo = $row["matricNo"];
    $name = $row["studentname"];
    $semester = $row["sem"];
    $totalmerit = $row["totalmerit"];

    $column_matricNo = $column_matricNo.$matricNo."\n";
    $column_name = $column_name.$name."\n";
    $column_semester = $column_semester.$semester."\n";
    $column_totalmerit = $column_totalmerit.$totalmerit."\n";

    //Sum all the Prices (TOTAL)
  //  $total = $total+$real_price;
}
}
mysqli_close($conn);

//Convert the Total Price to a number with (.) for thousands, and (,) for decimals.
//$total = number_format($total,',','.','.');

//Create a new PDF file
$pdf=new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
//for($i=1;$i<=40;$i++)
  //  $pdf->Cell(0,10,'Printing line number '.$i,0,1);
//Fields Name position
$Y_Fields_Name_position = 20;
//Table position, under Fields Name
$Y_Table_Position = 26;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(25);
$pdf->Cell(30,6,'Matric No',1,0,'L',1);
$pdf->SetX(65);
$pdf->Cell(70,6,'Name',1,0,'L',1);
$pdf->SetX(140);
$pdf->Cell(30,6,'Semester',1,0,'L',1);
$pdf->SetX(175);
$pdf->Cell(30,6,'Total Merit',1,0,'L',1);
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(25);
$pdf->MultiCell(25,6,$column_matricNo,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(70,6,$column_name,1,'L');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(140);
$pdf->MultiCell(30,6,$column_semester,1,);
$pdf->SetX(175);
$pdf->MultiCell(30,6,$column_totalmerit,1);

//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
    $pdf->SetX(25);
    $pdf->MultiCell(30,6,'',1);
    $i = $i +1;
}

$pdf->Output();
?>
