<?php
    session_start();
    include 'menu.php';
    include 'db_connection.php';
    //include "main_background.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/users.css">
    <title>Списък със задачи</title>
</head>

<body>

    <main>
        <div class="users-box">
            <div class="single-users">
                <div class="users-title mb-4">
                    <h4>Потребители</h4>
                </div>
                <div class="users-display">
<!---->
                    <div class="user">
                        <div class="user-info">
                            <div class="user-image-container">
                                <img src="img/kati.png" alt="">
                            </div>
                            <div class="user-subinfo">
                                <h6>Mira Lambreva</h6>
                                <p>25/06/2006</p>
                                <h6>miralambreva@gmail.com</h6>
                                <p>0895432535</p>
                            </div>
                        </div>
                        <div class="user-more">
                            <div class="user-color">
                                <div style="background-color: lightblue;"></div>
                            </div>
                            <div class="user-last-task">
                                <div class="task-inner d-flex flex-row align-items-center">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $sqluser = "SELECT * FROM `user`";
                    $resultuser = mysqli_query($con, $sqluser);
                
                //nqkolko reda
                $userscount = mysqli_num_rows($resultuser);
                $users = array();
                while ($rowuser = mysqli_fetch_assoc($resultuser)) 
                {
                        $users[] = $rowuser;
                }

                for($i = 0; $i < $userscount; $i++)
                {
                    $user = $users[$i];
                    
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
                    <div class="user">
                        <div class="user-info">
                            <div class="user-image-container">
                                <img src="img/miri.png" alt="">
                            </div>
                            <div class="user-subinfo">
                                <h6>Mira Lambreva</h6>
                                <p>25/06/2006</p>
                                <h6>miralambreva@gmail.com</h6>
                                <p>0895432535</p>
                            </div>
                        </div>
                        <div class="user-more">
                            <div class="user-color">
                                <div style="background-color: lightblue;"></div>
                            </div>
                            <div class="user-last-task">
                                <div class="task-inner d-flex flex-row align-items-center">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="groups">
                <div class="users-title mb-4">
                    <h4>Групи</h4>
                </div>
                <div class="groups-display">
                    <div class="group">
                        <div class="group-info">
                            <div class="group-image-container">
                                <img src="img/kati.png" alt="">
                            </div>
                            <div class="group-image-container">
                                <img src="img/miri.png" alt="">
                            </div>
                            <div class="group-image-container">
                                <img src="img/zazi.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- <div class="all-users-container">
        <div name="user-container" class="user-container">
            <div class="avatar-container">
                <img id="miri" src="img/miri.png" class="avatar">
            </div>
            <div class="user-features-container">
                <p>Мира Ламбрева</p>
                <p>25.06.2006</p>
            </div>
        </div>
        <div name="user-container" class="user-container">
            <div class="avatar-container">
                <img id="zazi" src="img/zazi.png" class="avatar">
            </div>
            <div class="user-features-container">
                <p>Радинела Базлянкова</p>
                <p>25.08.2006</p>
            </div>
        </div>
        <div name="user-container" class="user-container">
            <div class="avatar-container">
                <img id="kati" src="img/kati.png" class="avatar">
            </div>
            <div class="user-features-container">
                <p>Катерина Прончева</p>
                <p>06.05.2006</p>
            </div>
        </div> -->
    </>

    <div class="main-img"></div>
</body>

</html>