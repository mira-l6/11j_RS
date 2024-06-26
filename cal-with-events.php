<?php
    include "menu.php";
    // include "main_background.php";
?>
<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Списък със задачи</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/eventCal.css">
</head>

<body>
  <div class="calendar-container">
    <div class="left">
      <div class="calendar">
        <div class="month">
          <i class="fa fa-angle-left prev"></i>
          <div class="date"></div>
          <i class="fa fa-angle-right next"></i>
        </div>

        <div class="weekdays">
          <div>Пон</div>
          <div>Вт</div>
          <div>Ср</div>
          <div>Чт</div>
          <div>Пт</div>
          <div>Сб</div>
          <div>Нд</div>
        </div>

        <div class="days">
          <!--<div class="day prev-date">30</div>
          <div class="day prev-date">31</div>
          <div class="day">1</div>
          <div class="day">2</div>
          <div class="day">3</div>
          <div class="day">4</div>
          <div class="day">5</div>
          <div class="day">6</div>
          <div class="day">7</div>
          <div class="day">8</div>
          <div class="day">9</div>
          <div class="day">10</div>
          <div class="day">11</div>
          <div class="day">12</div>
          <div class="day">13</div>
          <div class="day">14</div>
          <div class="day today active">15</div>
          <div class="day">16</div>
          <div class="day">17</div>
          <div class="day">18</div>
          <div class="day">19</div>
          <div class="day">20</div>
          <div class="day">21</div>
          <div class="day">22</div>
          <div class="day">23</div>
          <div class="day">24</div>
          <div class="day">25</div>
          <div class="day">26</div>
          <div class="day">27</div>
          <div class="day">28</div>
          <div class="day">29</div>
          <div class="day">30</div>
          <div class="day next-date">1</div>
          <div class="day next-date">2</div>
          <div class="day next-date">3</div>-->
        </div>
        <div class="goto-today">
          <div class="goto">
            <input type="text" placeholder="mm/yyyy" class="date-input">
            <button class="goto-btn">go</button>
          </div>
          <button class="today-btn">today</button>
        </div>
      </div>
    </div>

    <div class="right">
      <div class="today-date">
        <div class="event-day">Ср</div>
        <div class="event-date">16 ноември 2024</div>
      </div>

      <div class="events">
        <!--<div class="event">
          <div class="title">
            <i class="fas fa-circle"></i>
            <h3 class="event-title">Задача 1</h3>
          </div>

          <div class="event-time">10:00 - 13:15</div>
        </div>-->
      </div>
    </div>
  </div>

  <div class="main-img"></div>
  <script src="js/eventCal.js"></script>
</body>

</html>