<?php
   session_start();
   include "db_connection.php"; 

   if(isset($_POST['task'])){

        $task = trim($_POST['task']);

        if(isset($_POST['description'])){
            $description = trim($_POST['description']);
        }
        else{
            $description = null;
        }

        if(isset($_POST['category'])){
            $category = 1;

        }
        else{
            $category = null;
        }

        if(isset($_POST['start-date'])){
            $start_date = trim($_POST['start-date']);
        }
        else{
            $start_date = null;
        }

        if(isset($_POST['due-date'])){
            $due_date = trim($_POST['due-date']);
        }
        else{
            $due_date = null;
        }

        if(isset($_POST['color'])){
            $color = trim($_POST['color']);
        }
        else{
            $color = null;
        }

        
        $sqlnewtask = "INSERT INTO `task`(`task_Task`, `task_Description`, `task_Color`, `task_StartTime`, `task_DueTime`, `task_Status`, `task_CategoryID`)
        VALUES ('$task', '$description', '$color', '$start_date', '$due_date', '0', '1')";
        $resultnewtask = mysqli_query($con, $sqlnewtask);

        if($resultnewtask){
            header("Location: profile.php?rabotish li");
        }
        else{
            header("Location: profile.php?ne raboti");
        }

   }
   else{
        header("Location: profile.php?стойностите не са зададени");
        exit();
   }