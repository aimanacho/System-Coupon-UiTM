<?php
// change eventstatus if certain events havent change the eventstatus right after the event finished
include ("connection.php");
$sql = "SELECT COUNT(eventcode) AS count FROM events";
$result = mysqli_query($conn, $sql);
$t = mysqli_fetch_assoc($result);
$count = $t['count'];

$sqltime = "SELECT CURRENT_TIME() as cTime, CURRENT_DATE() as cDate";
$result = mysqli_query($conn, $sqltime);
$t = mysqli_fetch_assoc($result);
$currenttime = $t['cTime'];
$currentdate = $t['cDate'];

for ( $x = 1; $x < $count; $x++)
{
  $sql = "SELECT * FROM events WHERE eventcode = '".$x."'";
  $result = mysqli_query($conn, $sql);
  $t = mysqli_fetch_assoc($result);
  $eventdate = $t['eventdate'];
  $timeend = $t['timeend'];
  if ($currentdate >= $eventdate)
  {
    if ($currenttime >= $timeend )
    {
      $sqlevent = "UPDATE events SET eventstatus = '4' WHERE eventcode = '".$x."'";
      $result = mysqli_query($conn, $sqlevent);
    }
  }
}
 ?>
