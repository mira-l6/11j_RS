<?php

header('Content-Type: application/json');
include 'db_connection.php';

$sql = "SELECT `task_Task` AS `title`, `task_DueTime` AS `ttime` FROM `task`";
$result = mysqli_query($con, $sql);

$eventsArr = array();
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        $eventsArr[] = $row;
    }
}


//$con->close();

echo json_encode($eventsArr);