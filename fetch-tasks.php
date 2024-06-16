<?php

header('Content-Type: application/json');
include 'db_connection.php';

$sql = "SELECT `task_Task`, `task_DueTime` FROM `task`";
$result = mysqli_query($con, $sql);

$tasks = array();
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result))
    {
        $tasks[] = $row;
    }
}


$con->close();

echo json_encode($tasks);