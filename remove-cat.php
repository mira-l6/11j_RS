<?php
    session_start();
    include "db_connection.php";


    $toberemovedid = $_GET['id'];

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