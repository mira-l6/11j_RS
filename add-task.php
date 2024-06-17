<?php
   session_start();
   include "db_connection.php"; 

   if(isset($_POST['task']))
   {
        $task = trim($_POST['task']);

        if(isset($_POST['description']))
        {
            $description = trim($_POST['description']);
        }
        else
        {
            $description = null;
        }

        if(isset($_POST['category']))
        {
            $category = trim($_POST['category']);

        }
        else
        {
            $category = null;
        }

        if(isset($_POST['start-date']))
        {
            $start_date = trim($_POST['start-date']);
        }
        else
        {
            $start_date = null;
        }

        if(isset($_POST['due-date']))
        {
            $due_date = trim($_POST['due-date'])." 00:00:00";
        }
        else
        {
            $due_date = null;
        }

        if(isset($_POST['color']))
        {
            $color = trim($_POST['color']);
        }
        else
        {
            $color = null;
        }

        // if($start_date == null && $due_date == null){
        //     $sqlnewtask = "INSERT INTO `task`(`task_Task`, `task_Description`, `task_Color`, `task_StartTime`, `task_DueTime`, `task_Status`, `task_CategoryID`)
        //     VALUES ('$task', '$description', '$color',null ,null , '0', '$category')";
        //     $resultnewtask = mysqli_query($con, $sqlnewtask);
        // }else{
            $sqlnewtask = "INSERT INTO `task`(`task_Task`, `task_Description`, `task_Color`, `task_StartTime`, `task_DueTime`, `task_Status`, `task_CategoryID`)
            VALUES ('$task', '$description', '$color', '$start_date  00:00:00', '$due_date', '0', '$category')";
            $resultnewtask = mysqli_query($con, $sqlnewtask);
        // }

        if($resultnewtask){
            header("Location: todo-list.php?Raboti");

            $currenttaskID = mysqli_insert_id($con);

            $currentuser = $_SESSION['login_UserID'];
            $newuser_tasksql = "INSERT INTO `user_task`(`task_ID`, `user_ID`)
            VALUES ('$currenttaskID', '$currentuser')";
            $result_usertask = mysqli_query($con, $newuser_tasksql);

            if($result_usertask){
                header("Location: todo-list.php?potrebitelqt uspesho dobawi zadacha w swoq list");
            }else{
                header("Location: todo-list.php?ne stava");
            }
        }
        else{
            header("Location: todo-list.php?ne raboti");
        }

   }
   else{
        header("Location: profile.php?стойностите не са зададени");
        exit();
   }