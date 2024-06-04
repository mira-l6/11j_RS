<?php
    include "menu.php";
    include "main_background.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
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
            <form action="" method="post">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="email" placeholder="Въведете имейл" name="email">
                    <label for="email">Имейл</label>
                </div>

                <div class="form-floating mt-3 mb-3">
                    <input type="text" class="form-control" id="pass" placeholder="Въведете парола" name="password">
                    <label for="pass">Парола</label>
                </div>

                <div class="login-additional">
                    <span><a href="">Забравена парола?</a></span>
                    <span ><a href="register.php">Нямате профил? Регистрация</a></span>
                </div>
                
                <input type="submit" value="Вход">
            </form>
        </div>
    </main>
</body>

</html>