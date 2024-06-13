<?php
include "menu.php";
include "main_background.php";
include "db_connection.php";
?>
<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/categories.css">
    <title>Списък със задачи</title>
</head>

<body>

    <div class="main">
        <!-- може да има категориите и всички задачи от всяка категория, поле за добавяне на категория, просто лист с категориите и редактирането им ??  -->
        <div class="categories-box">
            <div class="all-tasks">
                <h4 class="text-center p-4">Задачи по категории</h4>
                <div class="all-tasks-display">
                
                <?php
                //cat container
                    $sqlcat = "SELECT * FROM `category`";
                    $resultcat = mysqli_query($con, $sqlcat);
                    $catcount = mysqli_num_rows($resultcat);
                    $cats = array();

                    while ($rowcat = mysqli_fetch_assoc($resultcat)) 
                    {
                        $cats[] = $rowcat;
                    }

                    for ($j = 0; $j < $catcount; $j++)
                    {
                        $cat = $cats[$j];
                        $categoryname = $cat['category_Name'];
                        $categoryid = $cat['category_ID'];
                        echo '<div class="category-container">';
                        echo '    <h5>'.$categoryname.'</h5>';
                        echo '    <div class="category-tasks d-flex flex-column ">';

                        //задачите
                        $sqltasks = "SELECT * FROM `task` WHERE `task_CategoryID`='$categoryid'";
                        $resulttasks = mysqli_query($con, $sqltasks);

                        //nqkolko reda
                        $taskscount = mysqli_num_rows($resulttasks);
                        $tasks = array();
                        while ($rowtask = mysqli_fetch_assoc($resulttasks))
                        {
                            $tasks[] = $rowtask;
                        }

                        for ($i = 0; $i < $taskscount; $i++)
                        {
                            $task = $tasks[$i];

                            //info
                            $taskid = $task['task_ID'];
                            $tasktask = $task['task_Task'];
                            $description = $task['task_Description'];
                            $color = $task['task_Color'];
                            $starttime = $task['task_StartTime'];
                            $duetime = $task['task_DueTime'];
                            $status = $task['task_Status'];
                            $categoryid = $task['task_CategoryID'];

                            echo '<div class="task">';
                            echo '  <div class="task-inner d-flex flex-row">';
                            echo '    <span><i class="material-icons">check</i></span>';
                            echo '        <h6>'.$tasktask.'</h6>';
                            echo '    </div>';
                            echo '    <div class="task-color-category">';
                            echo '        <span class="task-color" style="background-color: '.$color.'"></span>';
                            echo '        <span class="task-category">'.$categoryname.'</span>';
                            echo '          </div>';
                            echo '          <div class="task-due-date">';
                            echo '          <p>До <span>'.$duetime.'</span></p>';
                            echo '          </div>';
                            echo '        </div>';
                        }

                        echo '        </div>';
                        echo '    </div>';
                    }
                ?>
                    
                </div>
            </div>
            <div class="categories-space">
                <div class="all-categories">
                    <h5 class="text-center p-3">Всички категории</h5>
                    <div class="all-categories-display">
                        <div class="category">
                            <h6>Работа</h6>
                        </div>
                        <div class="category">
                            <h6>Училище</h6>
                        </div>
                        <div class="category">
                            <h6>Домашни задължения</h6>
                        </div>
                        <div class="category">
                            <h6>Домашни </h6>
                        </div>
                        <div class="category">
                            <h6>Пазар</h6>
                        </div>
                        <div class="category">
                            <h6>Домашни задължения</h6>
                        </div>
                        <div class="category">
                            <h6>Домашни неща</h6>
                        </div>

                    </div>
                </div>
                <div class="add-category-box">
                    <h5 class="text-center p-3">Добавяне на категория</h5>
                    <form id="add-cat" action="add-category.php" method="post" class="ps-5 pe-5 pb-5 pt-3">
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control" id="category-name" placeholder="Въведете име" name="category-name">
                            <label for="category-name">Име на категория</label>
                            <input type="submit" value="Добавяне">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>