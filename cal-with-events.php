<?php
    include "menu.php";
    include "main_background.php";
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
  <div class="container">
    <div class="left">
      <div class="calendar">
        <div class="month">
          <i class="fa fa-angle-left prev"></i>
          <div class="date">June 2024</div>
          <i class="fa fa-angle-right next"></i>
        </div>
      </div>
    </div>
  </div>

  <script src="js/eventCal.js"></script>
</body>

</html>