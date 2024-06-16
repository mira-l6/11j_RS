<?php
    include "menu.php";
    include "main_background.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="bg">

<head>
    <?php
        if(!isset($_SESSION['login_UserID'])){
            echo '<style>';
            echo '  .navbar a:nth-child(2){';
            echo '      display: none }';
            echo '  .navbar a:nth-child(3){';
            echo '      display: none }';
            echo '  .navbar a:nth-child(4){';
            echo '      display: none }';
            echo '  .navbar a:nth-child(5){';
            echo '      display: none }';
            echo '</style';
        }
    ?>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Списък със задачи</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito Sans">
</head>

<body>
    <div class="main-title d-flex flex-column justify-content-center align-items-center">
        <h1>Списък със задачи</h1>
        <button onclick="window.location = 'login.php'" class="main-todo-button">Вход / Регистрация</button>
    </div>
</body>

</html>