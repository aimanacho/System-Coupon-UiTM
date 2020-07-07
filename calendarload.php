<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=its332new2020', 'root', '');

$data = array();

$query = "SELECT * FROM events ORDER BY eventcode";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["eventcode"],
  'title'   => $row["eventname"],
  'start'   => $row["timestart"],
  'end'   => $row["timeend"]
 );
}

echo json_encode($data);

?>
