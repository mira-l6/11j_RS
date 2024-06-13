<?php
include "menu.php";
include "main_background.php";
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
                    <div class="category-container">
                        <h5>Работа</h5>
                        <div class="category-tasks d-flex flex-column ">
                            <div class="task">
                                <div class="task-inner d-flex flex-row">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightblue"></span>
                                    <span class="task-category">Работа</span>
                                </div>
                                <div class="task-due-date">
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>

                            <?php
                    $sqltasks = "SELECT * FROM `task` WHERE `task_CategorID`=1";
                    $resulttasks = mysqli_query($con, $sqluser);
                
                //nqkolko reda
                $taskscount = mysqli_num_rows($resulttasks);
                $tasks = array();
                while ($rowtask = mysqli_fetch_assoc($resulttasks)) 
                {
                        $tasks[] = $rowtask;
                }

                for($i = 0; $i < $taskscount; $i++)
                {
                    $task = $tasks[$i];
                    
                    //info
                    $userid = $user['user_ID'];
                    $name = $user['user_FirstName'];
                    $lastname = $user['user_LastName'];
                    $birthday = $user['user_Birthday'];
                    $email = $user['user_Email'];
                    $phone = $user['user_Phone'];
                    $color = $user['user_Color'];
                    $imageid = $user['user_ImageID'];

                    //snimka
                    if($imageid != null)
                    {
                        $sqlimg = "SELECT * FROM `image` WHERE `image_ID`='$imageid'";
                        $resultimg = mysqli_query($con, $sqlimg);
                        if($resultimg)
                        {
                            $rowimg = mysqli_fetch_assoc($resultimg);
                            $userimgurl = $rowimg['image_URL'];
                        }
                        else
                        {
                            echo "neshto se oburka sus snimkata";
                        }
                    }
                    else
                    {
                        $userimgurl = "img/profile_icon.jpg";
                    }

                    //nai-nalezhashta zadacha
                    $sqltask = "SELECT * FROM `user_task` WHERE `user_ID`='$userid' ORDER BY `task_ID` DESC LIMIT 1";
                    $resulttask = mysqli_query($con, $sqltask);
                    if(mysqli_num_rows($resulttask) === 1)
                    {
                        $rowtask = mysqli_fetch_assoc($resulttask);
                        $taskid = $rowtask['task_ID'];
                        
                        $sqlgettask = "SELECT * FROM `task` WHERE `task_ID`='$taskid'";
                        $resultgettask = mysqli_query($con, $sqlgettask);
                        if($resultgettask)
                        {
                            $rowgettask = mysqli_fetch_assoc($resultgettask);
                            $taskname = $rowgettask['task_Task'];
                        }
                    }
                    else
                    {
                        $taskname = "Няма задачи";
                    }

                    echo '<div class="user">';
                    echo '  <div class="user-info">';
                    echo '    <div class="user-image-container">';
                    echo '        <img src="'.$userimgurl.'" alt="">';
                    echo '    </div>';
                    echo '    <div class="user-subinfo">';
                    echo '        <h6>'.$name.' '.$lastname.'</h6>';
                    echo '        <p>'.$birthday.'</p>';
                    echo '          <h6>'.$email.'</h6>';
                    echo '          <p>'.$phone.'</p>';
                    echo '          </div>';
                    echo '          </div>';
                    echo '        <div class="user-more">';
                    echo '    <div class="user-color">';
                    echo '  <div style="background-color: '.$color.';"></div>';
                    echo '      </div>';
                    echo '  <div class="user-last-task">';
                    echo '    <div class="task-inner d-flex flex-row align-items-center">';
                    echo '  <span><i class="material-icons">check</i></span>';
                    echo '<h6>'.$taskname.'</h6>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }?>

                            <div class="task">
                                <div class="task-inner d-flex flex-row">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightblue"></span>
                                    <span class="task-category">Работа</span>
                                </div>
                                <div class="task-due-date">
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>
                            <div class="task">
                                <div class="task-inner d-flex flex-row">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightblue"></span>
                                    <span class="task-category">Работа</span>
                                </div>
                                <div class="task-due-date">
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>
                            <div class="task">
                                <div class="task-inner d-flex flex-row">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightblue"></span>
                                    <span class="task-category">Работа</span>
                                </div>
                                <div class="task-due-date">
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="category-container">
                        <h5>Училище</h5>
                        <div class="category-tasks d-flex flex-column ">
                            <div class="task">
                                <div class="task-inner d-flex flex-row">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightblue"></span>
                                    <span class="task-category">Работа</span>
                                </div>
                                <div class="task-due-date">
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>
                            <div class="task">
                                <div class="task-inner d-flex flex-row">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightblue"></span>
                                    <span class="task-category">Работа</span>
                                </div>
                                <div class="task-due-date">
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="category-container">
                        <h5>Домашни задължения</h5>
                        <div class="category-tasks d-flex flex-column ">
                            <div class="task">
                                <div class="task-inner d-flex flex-row">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightblue"></span>
                                    <span class="task-category">Работа</span>
                                </div>
                                <div class="task-due-date">
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>
                            <div class="task">
                                <div class="task-inner d-flex flex-row">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightblue"></span>
                                    <span class="task-category">Работа</span>
                                </div>
                                <div class="task-due-date">
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="categories-space">
                <div class="all-categories">
                    <h5 class="text-center p-3">Всички категории</h5>
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