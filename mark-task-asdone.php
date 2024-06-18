<?php

    include "db_connection.php";
    session_start();

    $taskid = $_GET['taskid'];

    $sqlmark = "UPDATE `task` SET `task_Status` = 1 WHERE `task_ID` = ".$taskid;
    $resultmark = mysqli_query($con, $sqlmark);

    if($resultmark){
        header("Location: profile.php?Задача е маркирана като готова успешно");
    }else{
        header("Location: profile.php?ima greshka");
    }