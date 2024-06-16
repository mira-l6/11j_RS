<?php
    session_start();
    include "db_connection.php";


    $toberemovedid = $_GET['taskid'];

    $sqlremoveut = "DELETE FROM `user_task` WHERE `task_ID`='$toberemovedid'";
    $resultremoveut = mysqli_query($con, $sqlremoveut);
    if($resultremoveut)
    {
        $sqlremovet = "DELETE FROM `task` WHERE `task_ID`='$toberemovedid'";
        $resultremovet = mysqli_query($con, $sqlremovet);
        if ($resultremovet)
        {
            header("Location: profile.php");
        }
        else
        {
            header("Location: profile.php?error=Задачата не можа да бъде изтрита");
        }
    }
    else
    {
        header("Location: profile.php?error=Задачата не можа да бъде изтрита ot user task");
    }

    