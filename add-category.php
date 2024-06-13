<?php
    session_start();
    include 'db_connection.php';

    if(isset($_POST['category-name']))
    {
        $categoryname = $_POST['category-name'];

        $sqlcat = "INSERT INTO `category`(`category_Name`)
                    VALUES('$categoryname')";
        $resultcat = mysqli_query($con, $sqlcat);
        if($resultcat)
        {
            header("Location: categories.php");
        }
        else
        {
            header("Location: categories.php?error=ne se dobavi");
        }
    }
    else
    {
        header("Location: categories.php?error=ne e zadadeno ime");
    }