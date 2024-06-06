<?php
    include "menu.php";
    include "main_background.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/todo-list.css">
    <link rel="stylesheet" href="css/main_background_scroll.css">
    <title>Списък със задачи</title>
</head>

<body>
    <main>
        <div class="todo-list-box">
            
        <table class="table">
    <thead class="table-dark">
      <tr>
        <th>Задача</th>
        <th>Категория</th>
        <th>Статус</th>
        <th>Начало</th>
        <th>Краен срок</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Изхвърли боклука</td>
        <td>Трябва да изхвърля малкия</td>
        <td>john@example.com</td>
      </tr>
    </tbody>
  </table>
        </div>
    </main>
</body>

</html>