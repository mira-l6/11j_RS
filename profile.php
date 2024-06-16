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

//взимане на последните задачи 

//без краен срок
//$sqlnodue = "SELECT * FROM `task` WHERE `task_DueTime` IS NULL AND `task_Status`='0' ORDER BY `task_ID` DESC LIMIT 1";
//SELECT `user_task`.`task_ID`, `user_task`.`user_ID`, `task`.`task_Task`, `task`.`task_Color`, `task`.`task_DueTime`, `task`.`task_Status` FROM `user_task` JOIN task ON user_task.task_ID = task.task_ID WHERE user_ID=1;
$sqlnodue = "SELECT `user_task`.`task_ID`, `user_task`.`user_ID`, `task`.`task_Task`, `task`.`task_Color`, DATE_FORMAT(DATE(`task_DueTime`), \"%e/%c/%Y\"), `task`.`task_Status`, `task`.`task_CategoryID` FROM `user_task` JOIN `task` ON `user_task`.`task_ID` = `task`.`task_ID` WHERE `user_ID`='$userid' AND `task_DueTime` IS NULL AND `task_Status`='0' ORDER BY `task_ID` DESC LIMIT 1";
$resultnodue = mysqli_query($con, $sqlnodue);
if(mysqli_num_rows($resultnodue) > 0)
{
    $isnodue = true;

    $rownodue = mysqli_fetch_assoc($resultnodue);
    $noduetask = $rownodue['task_Task'];
    $noduecolor = $rownodue['task_Color'];
    if($noduecolor === null)
    {
        $noduecolor = 'grey';
    }
    $noduecatid = $rownodue['task_CategoryID'];
    $noduetaskid = $rownodue['task_ID'];

    $sqlnoduecat = "SELECT * FROM `category` WHERE `category_ID`='$noduecatid'";
    $resultnoduecat = mysqli_query($con, $sqlnoduecat);
    if($resultnoduecat)
    {
        if($rownoduecat = mysqli_fetch_assoc($resultnoduecat))
        {
            $noduecatname = $rownoduecat['category_Name'];
        }
        else
        {
            $noduecatname = null;
        }
    }
    // else
    // {
    //     $noduecatname = null;
    // }

}
else
{
    $isnodue = false;
}

//с краен срок
//$sqldue = "SELECT `task_ID`, `task_Task`, `task_Color`, `task_Status`, `task_CategoryID`, DATE_FORMAT(DATE(`task_DueTime`), \"%e/%c/%Y\") AS `task_DueTime` FROM `task` WHERE `task_DueTime` IS NOT NULL AND `task_Status`='0' ORDER BY `task_ID` DESC LIMIT 1";
$sqldue = "SELECT `user_task`.`task_ID`, `user_task`.`user_ID`, `task`.`task_Task`, `task`.`task_Color`, DATE_FORMAT(DATE(`task`.`task_DueTime`), \"%e/%c/%Y\") AS `task_DueTime`, `task`.`task_Status`, `task`.`task_CategoryID` FROM `user_task` JOIN `task` ON `user_task`.`task_ID` = `task`.`task_ID` WHERE `user_ID`='$userid' AND `task_DueTime` IS NOT NULL AND `task_Status`='0' ORDER BY `task_ID` DESC LIMIT 1";
$resultdue = mysqli_query($con, $sqldue);
if(mysqli_num_rows($resultdue) > 0)
{
    $isdue = true;

    $rowdue = mysqli_fetch_assoc($resultdue);
    $duetask = $rowdue['task_Task'];
    $duecolor = $rowdue['task_Color'];
    if($duecolor === null)
    {
        $duecolor = 'grey';
    }
    $duecatid = $rowdue['task_CategoryID'];
    $duetasktime = $rowdue['task_DueTime'];
    $duetaskid = $rowdue['task_ID'];

    if($duecatid)
    {
        $sqlduecat = "SELECT * FROM `category` WHERE `category_ID`='$duecatid'";
        $resultduecat = mysqli_query($con, $sqlduecat);
        if($resultduecat)
        {
            $rowduecat = mysqli_fetch_assoc($resultduecat);
            $duecatname = $rowduecat['category_Name'];
        }
        else
        {
            echo "greshka";
        }
    }
    else
    {
        $duecatname = "Без категория";
    }
}
else
{
    $isdue = false;
}

//завършени
//$sqlfin = "SELECT * FROM `task` WHERE `task_Status`='1' ORDER BY `task_ID` DESC LIMIT 1";
$sqlfin = "SELECT `user_task`.`task_ID`, `user_task`.`user_ID`, `task`.`task_Task`, `task`.`task_Color`, DATE_FORMAT(DATE(`task`.`task_DueTime`), \"%e/%c/%Y\") AS `task_DueTime`, `task`.`task_Status`, `task`.`task_CategoryID` FROM `user_task` JOIN `task` ON `user_task`.`task_ID` = `task`.`task_ID` WHERE `user_ID`='$userid' AND `task_Status`='1' ORDER BY `task_ID` DESC LIMIT 1";
$resultfin = mysqli_query($con, $sqlfin);
if(mysqli_num_rows($resultfin) > 0)
{
    $isfin = true;

    $rowfin = mysqli_fetch_assoc($resultfin);
    $fintask = $rowfin['task_Task'];
    $fincolor = $rowfin['task_Color'];
    if($fincolor === null)
    {
        $fincolor = 'grey';
    }
    $fincatid = $rowfin['task_CategoryID'];

    $fintasktime = $rowfin['task_DueTime'];
    if(!$fintasktime)
    {
        $fintasktime = 'Без краен срок';
    }
    $fintaskid = $rowfin['task_ID'];

    $sqlfincat = "SELECT * FROM `category` WHERE `category_ID`='$fincatid'";
    $resultfincat = mysqli_query($con, $sqlfincat);
    if($resultfincat)
    {
        $rowfincat = mysqli_fetch_assoc($resultfincat);
        $fincatname = $rowfincat['category_Name'];
    }
    else
    {
        $fincatname = null;
    }
}
else
{
    $isfin = false;
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
                            <h6>Без краен срок</h6>
                            <button id="addTaskBtn" class="add-task-button"> <i
                                    class="material-icons">add</i></button>
                        </div>
                        <div class="tasks-space">
                            <?php
                            if($isnodue)
                            {
                                echo '<div class="task">';
                                echo '  <div class="task-inner d-flex flex-row">';
                                echo '      <div class="task-title">';
                                echo '          <span><i class="material-icons">check</i></span>';
                                echo '          <h6>'.$noduetask.'</h6>';
                                echo '      </div>';
                                echo '      <button class="add-task-button-check"><i class="material-icons">check</i></button>';
                                echo '  </div>';
                                echo '  <div class="task-color-category">';
                                echo '      <span class="task-color" style="background-color: '.$noduecolor.'"></span>';
                                if($noduecatname === null)
                                {
                                    echo '  <span class="task-category">Без категория</span>';
                                }
                                else
                                {
                                    echo '  <span class="task-category">'.$noduecatname.'</span>';
                                }
                                echo '  </div>';
                                echo '  <div class="task-due-date">';
                                // echo '</div>';
                                //echo '<img src="" alt="">';
                                echo '      <p>Няма краен срок</p>';
                                echo '      <button class="delete-task-button" onclick="window.location =\'remove-task.php?taskid='.htmlspecialchars($noduetaskid).'\'"><i class="material-icons">delete</i></button>';
                                echo '  </div>';
                                echo '</div>';
                            }
                            else
                            {
                                echo '<div class="task p-3">';
                                echo '  <h6>*Няма добавени задачи в тази категория</h6>';
                                echo '</div>';
                            }
                            ?>         
                        </div>
                    </div>
                    <div class="tasks">
                        <div class="tasks-title">
                            <h6>С краен срок</h6>
                            <button class="add-task-button" onclick="addTaskPopupShow()"> <i
                                    class="material-icons">add</i></button>
                        </div>
                        <div class="tasks-space">
                        <?php
                            if($isdue)
                            {
                                echo '<div class="task">';
                                echo '  <div class="task-inner d-flex flex-row">';
                                echo '      <div class="task-title">';
                                echo '          <span><i class="material-icons">local_florist</i></span>';
                                echo '          <h6>'.$duetask.'</h6>';
                                echo '      </div>';
                                echo '      <button class="add-task-button-check"><i class="material-icons">check</i></button>';
                                echo '  </div>';
                                echo '  <div class="task-color-category">';
                                echo '      <span class="task-color" style="background-color: '.$duecolor.'"></span>';
                                echo '      <span class="task-category">'.$duecatname.'</span>';
                                echo '  </div>';
                                echo '  <div class="task-due-date">';
                                //echo '<img src="" alt="">';
                                echo '      <p>До <span>'.$duetasktime.'</span></p>';
                                echo '      <button class="delete-task-button" onclick="window.location =\'remove-task.php?taskid='.htmlspecialchars($duetaskid).'\'"><i class="material-icons">delete</i></button>';
                                echo '  </div>';
                                echo '</div>';
                                
                            }
                            else
                            {
                                echo '<div class="task p-3">';
                                echo '  <h6>*Няма добавени задачи в тази категория</h6>';
                                echo '</div>';
                            }
                        ?>
                        </div>
                    </div>
                    <div class="tasks">
                        <div class="tasks-title">
                            <h6>Завършени</h6>
                            <button id="addTaskBtn" class="add-task-button" onclick="addTaskPopupShow()"> <i
                                    class="material-icons">add</i></button>
                        </div>
                        <div class="tasks-space">
                        <?php
                            if($isfin)
                            {
                                echo '<div class="task">';
                                echo '  <div class="task-inner d-flex flex-row">';
                                echo '      <div class="task-title">';
                                echo '          <span><i class="material-icons">check</i></span>';
                                echo '          <h6>'.$fintask.'</h6>';
                                echo '      </div>';
                                echo '      <button class="add-task-button-check"><i class="material-icons">check</i></button>';
                                echo '  </div>';
                                echo '  <div class="task-color-category">';
                                echo '      <span class="task-color" style="background-color: '.$fincolor.'"></span>';
                                echo '      <span class="task-category">'.$fincatname.'</span>';
                                echo '  </div>';
                                echo '  <div class="task-due-date">';
                                //echo '</div>';
                                //echo '<img src="" alt="">';
                                if(!$fintasktime)
                                {
                                    echo '  <p>Няма краен срок</p>';
                                }
                                else
                                {
                                    echo '  <p>До <span>'.$fintasktime.'</span></p>';
                                }
                                echo '      <button class="delete-task-button" onclick="window.location =\'remove-cat.php?id='.htmlspecialchars($fintaskid).'\'"><i class="material-icons">delete</i></button>';
                                echo '  </div>';
                                echo '</div>';
                                
                            }
                            else
                            {
                                echo '<div class="task p-3">';
                                echo '  <h6>*Няма добавени задачи в тази категория</h6>';
                                echo '</div>';
                            }
                            ?> 
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