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
    <link rel="stylesheet" href="css/forgot-pass.css">
    <title>Списък със задачи</title>
</head>

<body>
    <main>
        <div class="forgot-pass-box">
            <form action="" method="post">
                <h2>Възстановяване на парола</h2>
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="email" placeholder="Въведете имейл" name="email">
                    <label for="email">Нова парола</label>
                </div>

                <div class="form-floating mt-3 mb-3">
                    <input type="text" class="form-control" id="pass" placeholder="Въведете парола" name="password">
                    <label for="pass">Повторете паролата</label>
                </div>
                <input type="submit">
            </form>
        </div>
    </main>
</body>

</html>