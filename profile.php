<?php
    include "menu.php";
    // include "main_background.php";
?>
<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Списък със задачи</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/main_background_scroll.css">
</head>

<body>
    <main>
        <div class="profile-box">
            <div class="profile-info">
                <div class="profile-image">
                    <img src="img/kati.png" alt="">
                </div>
                <div class="profile-subinfo">
                    <div>
                        <p><span>Mira</span> <span>Lambreva</span></p>
                        <p>06/25/2006</p>
                        <p>miralambreva@gmail.com</p>
                        <p>0895432535</p>
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
                            <button class="add-task-button" onclick="addTaskPopupShow()"> <i class="material-icons">add</i></button>
                        </div>
                        <div class="tasks-space">
                            <div class="task">
                                <div class="task-title">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                    <button class="add-task-button-check">буттон</button>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightblue"></span>
                                    <span class="task-category">Работа</span>
                                </div>
                                <div class="task-due-date">
                                    <!-- <img src="" alt=""> -->
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tasks">
                        <div class="tasks-title">
                            <h6>Започната</h6>
                            <button class="add-task-button" onclick="addTaskPopupShow()"> <i class="material-icons">add</i></button>
                        </div>
                        <div class="tasks-space">
                            <div class="task">
                                <div class="task-title">
                                    <span><i class="material-icons">local_florist</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightgreen    "></span>
                                    <span class="task-category">Училище</span>
                                </div>
                                <div class="task-due-date">
                                    <!-- <img src="" alt=""> -->
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="tasks-space">
                            <div class="task">
                                <div class="task-title">
                                    <span><i class="material-icons">local_florist</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightgreen    "></span>
                                    <span class="task-category">Училище</span>
                                </div>
                                <div class="task-due-date">
                                    <!-- <img src="" alt=""> -->
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="tasks-space">
                            <div class="task">
                                <div class="task-title">
                                    <span><i class="material-icons">local_florist</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightgreen    "></span>
                                    <span class="task-category">Училище</span>
                                </div>
                                <div class="task-due-date">
                                    <!-- <img src="" alt=""> -->
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tasks">
                        <div class="tasks-title">
                            <h6>Завършени</h6>
                            <button class="add-task-button" onclick="addTaskPopupShow()"> <i class="material-icons">add</i></button>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <div class="page-darken"></div>
</body>

</html>