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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/todo-list.css">
  <link rel="stylesheet" href="css/profile.css">
  <!-- <link rel="stylesheet" href="css/main_background_scroll.css"> -->
  <title>Списък със задачи</title>
</head>

<body>
  <main>
    <div class="todo-list-box">
      <table class="table">
        <thead class="table-head">
          <tr>
            <th>Задача</th>
            <th>Описание</th>
            <th>Категория</th>
            <th>Начало</th>
            <th>Срок</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Изхвърли боклука</td>
            <td>Трябва да изхвърля малкия</td>
            <td>john@example.com</td>
            <td>2005/05/05</td>
            <td>2005/05/05</td>
            <td class="delete-task-button"><button><i class="material-icons">delete</i></button></td>
          </tr>
          <tr>
            <td>Изхвърли боклука</td>
            <td>Трябва да изхвърля малкия</td>
            <td>john@example.com</td>
            <td>2005/05/05</td>
            <td>2005/05/05</td>
            <td class="delete-task-button"><button><i class="material-icons">delete</i></button></td>
          </tr>
          <tr>
            <td>Изхвърли боклука</td>
            <td>Трябва да изхвърля малкия</td>
            <td>john@example.com</td>
            <td>2005/05/05</td>
            <td>2005/05/05</td>
            <td class="delete-task-button"><button><i class="material-icons">delete</i></button></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="add-task-box">
    <h4 class="text-center mt-2 p-3">Добавяне на задача</h4>
        <form action="add-task.php" method="post" class="ps-5 pe-5">

            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="task" placeholder="Въведете задача" name="task">
                <label for="task">Задача</label>
            </div>

            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" id="description" placeholder="Въведете описание"
                    name="description">
                <label for="description">Описание</label>
            </div>

            <!-- <div class="status-area mb-3">
                <select name="status" id="status" class="form-select p-3">
                    <option value="">Статус</option>
                    <option value="Незавършена">Незавършена</option>
                    <option value="Започната">Започната</option>
                    <option value="Завършена">Завършена</option>
                </select>
            </div> -->

            <div class="category-area mb-3">
                <select name="category" id="category" class="form-select p-3">
                    <option value="">Категория</option>
                    <!-- php for cycle za opcii -->
                </select>
            </div>

            <div class="d-flex flex-row dates mb-3">
                <div class="w-50 date">
                    <label for="start-date" class="form-control">Начална дата (YYYY-MM-DD)</label>
                    <input id="start-date" type="string" class="form-control" pattern="\d{4}-\d{2}-\d{2}">
                </div>
                <div class="w-50 date">
                    <label for="due-date" class="form-control">Краен срок (YYYY-MM-DD)</label>
                    <input id="due-date" type="string" class="form-control" pattern="\d{4}-\d{2}-\d{2}">
                </div>
            </div>

            <div class="color-area">
                <select name="colour" id="color" class="form-select p-3">
                    <option value="">Цвят</option>
                    <option value="red">Червено</option>
                    <option value="orange">Оранжево</option>
                    <option value="yellow">Жълто</option>
                    <option value="lightgreen">Светлозелено</option>
                    <option value="darkgreen">Тъмнозелено</option>
                    <option value="lightblue">Светлосиньо</option>
                    <option value="darkblue">Тъмносиньо</option>
                    <option value="purple">Лилаво</option>
                    <option value="babypink">Розово</option>
                </select>
            </div>

            <div class="popup-buttons w-100 d-flex justify-content-around mt-3">
                <button id="closePopupBtn" onclick="addTaskPopupClose()">Изход</button>
                <input type="submit" value="Добавяне">
            </div>

        </form>
    </div>
  </main>
</body>

</html>