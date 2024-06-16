<?php
    session_start();
    include "main_background.php";
    include "menu.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/edit-image.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Списък със задачи</title>
</head>
<body>
<main>
        <div class="login-box">
            <h2 class="text-center">Редактиране на снимка</h2>
            <div id="preview" class="image-display">

            </div><!--
            <form id="edit-image-form" action="image-action.php" method="post">
                <div class="form-floating mb-3 mt-3">
                    <input type="file" class="form-control" id="profile-image" name="profile-image"
                    onchange="getImagePreview()">
                    <label for="email">Снимка</label>
                </div>
                <input type="submit" value="Запазване">
            </form>
-->
            
            <form action="image-action.php" method="post" enctype="multipart/form-data" id="form">
                <input type="file" id="image-upload-multiple" name="images[]" multiple onchange="getImagePreview()" class="form-control mb-3">
                <!-- <label for="image-upload-multiple">Снимка</label> -->

                <input type="submit" value="Запазване">
                <!--<button type="submit" class="add-ph-button">Запазване</button>-->
                        
            </form>

        </div>
    </main>
    <script src="js/visualizeImage.js"></script>
</body>
</html>