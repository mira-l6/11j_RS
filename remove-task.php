<?php
    session_start();
    include "db_connection.php";


    $toberemovedid = $_GET['taskid'];

    $sqlremovet = "DELETE FROM `task` WHERE `task_ID`='1'";
    $resultremovet = mysqli_query($con, $sqlremovet);
    if($resultremovet)
    {
        header("Location: profile.php");
    }
    else
    {
        header("Location: profile.php?error=Задачата не можа да бъде изтрита");
    }