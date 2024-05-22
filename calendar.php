<?php
include "menu.php";
?>
<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Списък със задачи</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="main-background-image">
        <img src="/11J_RS/img/main_background.jpg" alt="">
    </div>
    <div class="calendar-container">
        <div class="calendar-header">
            <button id="prev-month">&lt;</button>
            <h2 id="month-year"></h2>
            <button id="next-month">&gt;</button>
        </div>

        <table class="calendar-table">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="calendar-body"></tbody>
        </table>
    </div>


    <script src="js/calendar.js"></script>
</body>

</html>