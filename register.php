<?php
include "menu.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/main_background_scroll.css">
    <title>Списък със задачи</title>
</head>

<body>
    <main>
        <div class="register-box">
            <h2>Регистрация</h2>
            <form id="register-form" action="register-action.php" method="post">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="firstname" placeholder="Въведете име" name="firstname">
                    <label for="firstname">Първо име</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="lastname" placeholder="Въведете фамилия" name="lastname">
                    <label for="lastname">Фамилия</label>
                </div>
                
                <div class="d-flex register-checkboxes">
                    <div class="form-check">
                        <input type="radio" id="woman" name="gender" class="form-check-input" checked/>Жена
                        <label class="form-check-label" for="woman"></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="man" name="gender" class="form-check-input" />Мъж
                        <label class="form-check-label" for="man"></label>
                    </div>
                </div>

                <div class="birthdate-area">
                    <label for="birthday" class="form-control">Дата на раждане</label>
                    <input id="birthday" type="date" class="form-control">
                </div>

                <div class="color-area">
                    <select name="colour" id="colour" class="form-select">
                        <option value="" >Цвят</option>
                        <option value="red">Червено</option>
                        <option value="orange">Оранжево</option>
                        <option value="yellow">Жълто</option>
                        <option value="lightgreen">Светло зелено</option>
                        <option value="darkgreen">Тъмно зелено</option>
                        <option value="lightblue">Светло синьо</option>
                        <option value="darkblue">Тъмно синьо</option>
                        <option value="purple">Лилаво</option>
                        <option value="babypink">Розово</option>
                    </select>
                </div>

                <div class="upload-img-area">
                    <label for="picture" class="form-control">Прикачване на снимка</label>
                    <input id="picture" type="file" class="form-control">
                </div>

                <div class="form-floating mt-3 mb-3">
                    <input type="text" class="form-control" id="phone" placeholder="Въведете телефон" name="phone">
                    <label for="phone">Телефон</label>
                </div>

                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="email" placeholder="Въведете имейл" name="email">
                    <label for="email">Имейл</label>
                </div>


                <div class="form-floating mt-3 mb-3">
                    <input type="password" class="form-control" id="password" placeholder="Въведете парола" name="password">
                    <label for="password">Парола</label>
                </div>
                <div class="form-floating mt-3 mb-3">
                    <input type="text" class="form-control" id="password2" placeholder="Повторете паролата" name="password2">
                    <label for="password2">Повторете паролата</label>
                </div>

                <input type="submit" value="Регистрирай се">
            </form>
        </div>
    </main>
</body>

</html>