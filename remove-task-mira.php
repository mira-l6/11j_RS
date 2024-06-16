<?php
    session_start();
    include "db_connection.php";


    $toberemovedid = $_GET['taskid'];

    $sqlremovet = "DELETE FROM `user_task` WHERE `task_ID`= ".$toberemovedid;
    echo $sqlremovet;
    $resultremovet = mysqli_query($con, $sqlremovet);
     if($resultremovet)
     {
         $sqldelt = "DELETE FROM `task` WHERE `task_ID` = ".$toberemovedid;
         $resultdelt = mysqli_query($con, $sqldelt);
         if($resultdelt){
             header("Location: profile.php?Успешно изтрита задача");
         }else{
             header("Location: profile.php?error=Задачата ne да бъде изтрита");
         }
     }
     else
     {
         header("Location: profile.php?error=Задачата не можа да бъде изтрита");
     }