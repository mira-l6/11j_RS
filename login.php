<?php
    include "menu.php";
    include "main_background.php";

?>

<!DOCTYPE html>
<html lang="en">

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
        }else{
            echo 'SUPER';
        }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <title>Списък със задачи</title>
</head>

<body>
    <main>
        <div class="login-box">
            <h2>Вход</h2>
            <form id="login-form" action="login-action.php" method="post">
                <div class="form-floating mb-3 mt-3">
                    <input type="email" class="form-control" id="email" placeholder="Въведете имейл" name="email">
                    <label for="email">Имейл</label>
                </div>

                <div class="form-floating mt-3 mb-3">
                    <input type="password" class="form-control" id="password" placeholder="Въведете парола" name="password">
                    <label for="pass">Парола</label>
                </div>

                <div class="login-additional">
                    <span><a href="forgot-pass.php">Забравена парола?</a></span>
                    <span ><a href="register.php">Нямате профил? Регистрация</a></span>
                </div>
                
                <input type="submit" value="Вход">
            </form>
        </div>
    </main>
</body>

</html>