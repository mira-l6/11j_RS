<?php
session_start();
include "menu.php";
include "db_connection.php";
include "main_background.php";

//vzimane na infoto ot bd
$userid = $_SESSION['login_UserID'];

$sqluser = "SELECT * FROM `user` WHERE `user_ID`='$userid'";
$resultuser = mysqli_query($con, $sqluser);
if($resultuser)
{
    $rowuser = mysqli_fetch_assoc($resultuser);
    $firstname = $rowuser['user_FirstName'];
    $lastname = $rowuser['user_LastName'];
    $gender = $rowuser['user_Gender'];
    $birthday = $rowuser['user_Birthday'];
    $phone = $rowuser['user_Phone'];
    $email = $rowuser['user_Email'];
    $colour = $rowuser['user_Color'];
    
    if($rowuser['user_ImageID'])
    {
        $imgid = $rowuser['user_ImageID'];
        $sqlimg = "SELECT * FROM `image` WHERE `image_ID`='$imgid'";
        $resultimg = mysqli_query($con, $sqlimg);
        if($resultimg)
        {
            $rowimg = mysqli_fetch_assoc($resultimg);
            $imgurl = $rowimg['image_URL'];
        }
        else
        {
            echo "ne moja da bude izbrana sn ot bd";
        }
    }
    else
    {
        $imgurl = "img/profile_icon.jpg";
    }
}
else
{
    echo ":(";
}


?>
<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Списък със задачи</title>
    <link rel="stylesheet" href="css/profile.css">
    <!-- <link rel="stylesheet" href="css/main_background_scroll.css"> -->
</head>

<body>
    <main>
        <div class="profile-box">
            <div class="profile-info">
                <div class="profile-image">
                    <?php
                    echo '<img src="'.$imgurl.'" alt="">';
                    ?>
                    <!--<img src="img/profile_icon.jpg" alt="">-->
                    <button class="profile-edit-image-button"><a href="edit-image.php"><i class="material-icons">edit</i></a></button>
                </div>
                <div class="profile-subinfo">
                    <div>
                        <h6><span><?php echo $firstname?></span> <span><?php echo $lastname?></span></h6>
                        <p><?php echo $birthday?></p>
                        <h6><?php echo $email?></h6>
                        <p><?php echo $phone?></p>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="profile-tasks">
                <div class="profile-tasks-title">
                    <h3>Най-скорошни задачи</h3>
                </div>
                <div class="profile-tasks-content d-flex flex-row">
                    <div class="tasks">
                        <div class="tasks-title">
                            <h6>Незавършени</h6>
                            <button id="addTaskBtn" class="add-task-button"> <i
                                    class="material-icons">add</i></button>
                        </div>
                        <div class="tasks-space">
                            <div class="task">
                                <div class="task-inner d-flex flex-row">
                                    <div class="task-title">
                                        <span><i class="material-icons">check</i></span>
                                        <h6>Изхвърли боклука</h6>
                                    </div>
                                    <button class="add-task-button-check"><i class="material-icons">check</i></button>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightblue"></span>
                                    <span class="task-category">Работа</span>
                                </div>
                                <div class="task-due-date">
                                    <!-- <img src="" alt=""> -->
                                    <p>До <span>06/06/2024</span></p>
                                    <button class="delete-task-button"><i class="material-icons">delete</i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tasks">
                        <div class="tasks-title">
                            <h6>Започнати</h6>
                            <button class="add-task-button" onclick="addTaskPopupShow()"> <i
                                    class="material-icons">add</i></button>
                        </div>
                        <div class="tasks-space">
                            <div class="task">
                                <div class="task-inner d-flex flex-row">
                                    <div class="task-title">
                                        <span><i class="material-icons">local_florist</i></span>
                                        <h6>Изхвърли боклука</h6>
                                    </div>
                                    <button class="add-task-button-check"><i class="material-icons">check</i></button>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightblue"></span>
                                    <span class="task-category">Работа</span>
                                </div>
                                <div class="task-due-date">
                                    <!-- <img src="" alt=""> -->
                                    <p>До <span>06/06/2024</span></p>
                                    <button class="delete-task-button"><i class="material-icons">delete</i></button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tasks">
                        <div class="tasks-title">
                            <h6>Завършени</h6>
                            <button id="addTaskBtn" class="add-task-button" onclick="addTaskPopupShow()"> <i
                                    class="material-icons">add</i></button>
                        </div>
                        <div class="tasks-space">
                            <div class="task">
                                <div class="task-title">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: orange"></span>
                                    <span class="task-category">Училище</span>
                                </div>
                                <div class="task-due-date">
                                    <!-- <img src="" alt=""> -->
                                    <p>До <span>06/06/2024</span></p>
                                    <button class="delete-task-button"><i class="material-icons">delete</i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



    <!-- <div class="main-img"></div> -->
    <div class="popup" id="taskPopup">
        <h4 class="text-center mt-2 p-3">Добавяне на задача</h4>
        <form action="add-task.php" method="post" class="ps-5 pe-5">

            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="task" placeholder="Въведете задача" name="task">
                <label for="task">Задача</label>
            </div>

            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" id="description" placeholder="Въведете описание"
                    name="description">
                <label for="description">Описание</label>
            </div>

            <!-- <div class="status-area mb-3">
                <select name="status" id="status" class="form-select p-3">
                    <option value="">Статус</option>
                    <option value="Незавършена">Незавършена</option>
                    <option value="Започната">Започната</option>
                    <option value="Завършена">Завършена</option>
                </select>
            </div> -->

            <div class="category-area mb-3">
                <select name="category" id="category" class="form-select p-3">
                    <option value="">Категория</option>
                    <!-- php for cycle za opcii -->
                </select>
            </div>

            <div class="d-flex flex-row dates mb-3">
                <div class="w-50 date">
                    <label for="start-date" class="form-control">Начална дата (YYYY-MM-DD)</label>
                    <input id="start-date" name="start-date" type="string" class="form-control" pattern="\d{4}-\d{2}-\d{2}">
                </div>
                <div class="w-50 date">
                    <label for="due-date" class="form-control">Краен срок (YYYY-MM-DD)</label>
                    <input id="due-date" name="due-date" type="string" class="form-control" pattern="\d{4}-\d{2}-\d{2}">
                </div>
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
                    <option value="babypink">Розово</option>
                </select>
            </div>

            <div class="popup-buttons w-100 d-flex justify-content-around mt-3">
                <button id="closePopupBtn" onclick="addTaskPopupClose()">Изход</button>
                <input type="submit" value="Добавяне">
            </div>

        </form>
    </div>
    <div id="pageDarken" class="page-darken"></div>

    <script src="js/addTaskPopup.js"></script>
</body>

</html>