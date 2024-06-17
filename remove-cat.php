<?php
    session_start();
    include "db_connection.php";


    $toberemovedid = $_GET['id'];

    $sqlcattask = "UPDATE `task` SET `task_CategoryID` = null WHERE `task_CategoryID` = ".$toberemovedid;
    $resulupdatetask = mysqli_query($con, $sqlcattask);

    if($resulupdatetask){
        $sqlremove = "DELETE FROM `category` WHERE `category_ID`='$toberemovedid'";
        $resultremove = mysqli_query($con, $sqlremove);
        if($resultremove)
        {
            header("Location: categories.php");
        }
        else
        {
            header("Location: categories.php?error=Категорията не можа да бъде изтрита");
        }
    }else{
        header("Location: categories.php?Задачите с тази категория не искат да се обновят");
    }
