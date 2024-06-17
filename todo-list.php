<?php
include "menu.php";
include "main_background.php";
include "db_connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  -->
  <link rel="stylesheet" href="css/todo-list.css">
  <!-- <link rel="stylesheet" href="css/profile.css"> -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- <link rel="stylesheet" href="css/main_background_scroll.css"> -->
  <title>Списък със задачи</title>
</head>

<body>
  <main>
    <div class="todo-list-box">
      <table class="table">
        <thead class="table-head">
          <tr>
            <th>Задача</th>
            <th>Описание</th>
            <th>Категория</th>
            <th>Начало</th>
            <th>Срок</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <!-- <tr>
            <td>Изхвърли боклука</td>
            <td>Трябва да изхвърля малкия</td>
            <td>john@example.com</td>
            <td>2005/05/05</td>
            <td>2005/05/05</td>
            <td class="delete-task-button"><button><i class="material-icons">delete</i></button></td>
          </tr> -->
          <?php
            $currentuserID = $_SESSION['login_UserID'];
            $usertasks = array();
            $sqlget_taskcount = "SELECT COUNT(`task_ID`) FROM `user_task`
            WHERE `user_ID` = $currentuserID";
            $result_taskcount = mysqli_query($con, $sqlget_taskcount);
            
            if($result_taskcount){
              $taskcount = mysqli_fetch_row($result_taskcount)[0];

              $sqlgettasks = "SELECT `task_ID` FROM `user_task` WHERE `user_ID` = $currentuserID";
              $result_tasks = mysqli_query($con,$sqlgettasks);
              if($result_tasks){
                while($taskscolumn = mysqli_fetch_assoc($result_tasks)){
                  $usertasks[] = $taskscolumn;
                }

                if($taskcount == 0){
                  echo "<p>Все още нямате задачи</p>";
                }
                for($i = 0; $i < $taskcount; $i++){
                  $usertask = $usertasks[$i];
                  $usertask_ID = $usertask["task_ID"];
                  
                  $sqlget_currenttask = "SELECT * FROM `task` WHERE `task_ID` = $usertask_ID";
                  $result_currenttask = mysqli_query($con,$sqlget_currenttask);
                  if($result_currenttask){
                    $task = mysqli_fetch_assoc($result_currenttask);
                    $sqlgetcategory = "SELECT `category_Name` FROM `category` WHERE `category_ID` = ". $task['task_CategoryID'];
                    $result_category = mysqli_query($con,$sqlgetcategory);
                    if($result_category){
                      $category = mysqli_fetch_assoc($result_category);
                    }

                    if($task['task_Status'] == 0){
                      echo '<tr id="'.$task['task_ID'].'">';
                      echo '  <td>'.$task['task_Task'].'</td>';
                      echo '  <td>'.$task['task_Description'].'</td>';
                      echo '  <td>'.$category['category_Name'].'</td>';
                      echo '  <td>'.$task['task_StartTime'].'</td>';
                      echo '  <td>'.$task['task_DueTime'].'</td>';
                      echo '  <td><button id="delTaskBtn" class="delete-task-button" onclick="window.location =\'remove-task-todo.php?taskid='.htmlspecialchars($task['task_ID']).'\'"><i class="material-icons">delete</i></button></td>';
                      echo '</tr>';
                    }

                    // onclick="window.location =\'remove-task.php?taskid='.htmlspecialchars($task['task_ID']).'\'"

                    // if(isset($_POST[''.$task['task_ID'].''])){
                    //   $sqldelete_task = "DELETE FROM `task` WHERE `task_ID` = ".$_POST[''.$task['task_ID'].''];
                    //   $resultdeltask = mysqli_query($con, $sqldelete_task);
                    //   if($resultdeltask){
                    //     echo "uspesjo premahna zadacha";
                    //   }else{
                    //     header("Location: todo-list.php?ne moja da se premahne");
                    //   }
                    // }
                  }
                }
              }

            }else{
              header("Location: todo-list.php?ne iska da stane");
            }
          ?>
        </tbody>
      </table>
    </div>

    <div class="add-task-box">
      <h4 class="text-center mt-2 p-3">Добавяне на задача</h4>
      <form action="add-task.php" method="post">

        <div class="form-floating mb-3 mt-3">
          <input type="text" class="form-control" id="task" placeholder="Въведете задача" name="task">
        </div>

        <div class="form-floating mt-3 mb-3">
          <input type="text" class="form-control" id="description" placeholder="Въведете описание" name="description">
        </div>

        <div class="date">
          <label for="start-date" class="form-control">Начална дата (YYYY-MM-DD)</label>
          <input id="start-date" name="start-date" type="string" class="form-control" 
            placeholder="YYYY-mm-dd">
        </div>
        <div class="date">
          <label for="due-date" class="form-control">Краен срок (YYYY-MM-DD)</label>
          <input id="due-date" name="due-date" type="string" class="form-control" placeholder="YYYY-mm-dd">
        </div>

        <div class="category-area mb-3">
          <select name="category" id="category" class="form-select p-3">
            <option value="">Категория</option>
            <?php
            $sqlcat = "SELECT * FROM `category`";
            $resultcat = mysqli_query($con, $sqlcat);
            $catcount = mysqli_num_rows($resultcat);
            $cats = array();

            while ($rowcat = mysqli_fetch_assoc($resultcat)) {
              $cats[] = $rowcat;
            }
            $_SESSION['cats'] = $cats;

            for ($j = 0; $j < $catcount; $j++) {
              $cat = $cats[$j];
              $categoryname = $cat['category_Name'];
              $categoryid = $cat['category_ID'];
              echo '<option value="'.$categoryid.'">' . $categoryname . '</option>';
            }
            ?>
          </select>
        </div>

        <div class="color-area">
          <select name="color" id="color" class="form-select p-3">
            <option value="">Цвят</option>
            <option value="red">Червено</option>
            <option value="orange">Оранжево</option>
            <option value="yellow">Жълто</option>
            <option value="lightgreen">Светлозелено</option>
            <option value="darkgreen">Тъмнозелено</option>
            <option value="lightblue">Светлосиньо</option>
            <option value="darkblue">Тъмносиньо</option>
            <option value="purple">Лилаво</option>
            <option value="pink">Розово</option>
          </select>
        </div>

        <div class="popup-buttons w-100 d-flex justify-content-around mt-3">
          <input type="submit" value="Добавяне">
        </div>

      </form>
    </div>
  </main>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="js/todo-listDeleteTask.js"></script>

  <?php
    if($_POST['action'] == "dltRecord"){
      $id = $_POST['id'];
      $sqldelete_task = "DELETE FROM `task` WHERE `task_ID` = '$id'";
      $resultdlt_task = mysqli_query($con, $sqldelete_task);
      if($resultdlt_task){
        header("Location: todo-list.php?Maj uspeshno se pramhna molq te");
      }else{
        header("Location: todo-list.php?ne raboti premajvaneto");
      }
    }
  ?> -->
</body>

</html>