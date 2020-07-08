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
  $eventdate= $row["eventdate"];
  $timestart= $row["timestart"];
  $timeend= $row["timeend"];
  $combinedstart = date('Y-m-d H:i', strtotime("$eventdate $timestart"));
  $combinedend = date('Y-m-d H:i', strtotime("$eventdate $timeend"));
 $data[] = array(
  'id'   => $row["eventcode"],
  'title'   => $row["eventname"],
  'start'   => $combinedstart,
  'end'   => $combinedend
 );
}

echo json_encode($data);

?>
