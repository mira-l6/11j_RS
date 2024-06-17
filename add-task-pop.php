<?php
session_start();
include "db_connection.php";


if (isset($_POST['task']))
{
    $task = trim($_POST['task']);
    $description = isset($_POST['description']) ? trim($_POST['description']) : null;
    $category = isset($_POST['category']) && !empty($_POST['category']) ? trim($_POST['category']) : null;
    $color = isset($_POST['color']) ? trim($_POST['color']) : null;
    $start_date = isset($_POST['start-date']) && !empty($_POST['start-date']) ? trim($_POST['start-date']) . " 00:00:00" : null;
    $due_date = isset($_POST['due-date']) && !empty($_POST['due-date']) ? trim($_POST['due-date']) . " 00:00:00" : null;

    $sql = "INSERT INTO `task` (`task_Task`, `task_Description`, `task_Color`, `task_Status`, `task_CategoryID`";

    $val = " VALUES (?, ?, ?, '0', ?";
    $values = [$task, $description, $color, $category];
    if ($start_date !== null) 
    {
        $sql .= ", `task_StartTime`";
        $val .= ", ?";
        $values[] = $start_date;
    }
    if ($due_date !== null) 
    {
        $sql .= ", `task_DueTime`";
        $val .= ", ?";
        $values[] = $due_date;
    }
    $sql .= ") ";
    $val .= ")";
    $sql .= $val;

    $query = $con->prepare($sql);

    if ($query === false) 
    {
        header("Location: todo-list.php?error=greshka pri pdgotvqne: " . urlencode($error));
        exit();
    }

    $types = str_repeat('s', count($values));
    $query->bind_param($types, ...$values);
    
    if (mysqli_stmt_execute($query)) 
    {
        $currenttaskID = $query->insert_id;
        $currentuser = $_SESSION['login_UserID'];
        $newuser_tasksql = "INSERT INTO `user_task` (`task_ID`, `user_ID`) VALUES (?, ?)";

        $query_user_task = mysqli_prepare($con, $newuser_tasksql);
        $query_user_task->bind_param("ii", $currenttaskID, $currentuser);

        if (mysqli_stmt_execute($query_user_task)) 
        {
            header("Location: todo-list.php?potrebitelqt uspesho dobavi zadacha w svoq list");
        } 
        else 
        {
            $error = $query_user_task->error;
            //debug_to_console("Error executing user_task insert: " . $error);
            header("Location: todo-list.php?error=greshka na user_task insert: " . urlencode($error));
        }
    } 
    else 
    {
        $error = $query->error;
        //debug_to_console("Error executing task insert: " . $error);
        header("Location: todo-list.php?error=greshka na task insert: " . urlencode($error));
    }

    mysqli_close($con);
} 
else 
{
    header("Location: profile.php?стойностите не са зададени");
    exit();
}