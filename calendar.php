<?php
    include "menu.php";
    include "main_background.php";
?>
<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Списък със задачи</title>
    <link rel="stylesheet" href="css/calendar.css">
</head>

<body>
    <div class="calendar-container">
        <div class="calendar-header">
            <button id="prev-month">&lt;</button>
            <h2 id="month-year"></h2>
            <button id="next-month">&gt;</button>
        </div>

        <table class="calendar-table">
            <thead>
                <tr>
                    <th>Пон</th>
                    <th>Вт</th>
                    <th>Ср</th>
                    <th>Чт</th>
                    <th>Пт</th>
                    <th>Сб</th>
                    <th>Нд</th>
                </tr>
            </thead>
            <tbody id="calendar-body"></tbody>
        </table>
    </div>


    <script src="js/calendar.js"></script>
</body>

</html>