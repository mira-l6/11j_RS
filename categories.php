<?php
include "menu.php";
include "main_background.php";
?>
<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/categories.css">
    <title>Списък със задачи</title>
</head>

<body>

    <div class="main">
        <!-- може да има категориите и всички задачи от всяка категория, поле за добавяне на категория, просто лист с категориите и редактирането им ??  -->
        <div class="categories-box">
            <div class="all-tasks">
                <h4 class="text-center p-4">Задачи по категории</h4>
                <div class="all-tasks-display">
                    <div class="category-container">
                        <h5>Работа</h5>
                        <div class="category-tasks d-flex flex-column ">
                            <div class="task">
                                <div class="task-inner d-flex flex-row">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightblue"></span>
                                    <span class="task-category">Работа</span>
                                </div>
                                <div class="task-due-date">
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>
                            <div class="task">
                                <div class="task-inner d-flex flex-row">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightblue"></span>
                                    <span class="task-category">Работа</span>
                                </div>
                                <div class="task-due-date">
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>
                            <div class="task">
                                <div class="task-inner d-flex flex-row">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightblue"></span>
                                    <span class="task-category">Работа</span>
                                </div>
                                <div class="task-due-date">
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>
                            <div class="task">
                                <div class="task-inner d-flex flex-row">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightblue"></span>
                                    <span class="task-category">Работа</span>
                                </div>
                                <div class="task-due-date">
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="category-container">
                        <h5>Училище</h5>
                        <div class="category-tasks d-flex flex-column ">
                            <div class="task">
                                <div class="task-inner d-flex flex-row">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightblue"></span>
                                    <span class="task-category">Работа</span>
                                </div>
                                <div class="task-due-date">
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>
                            <div class="task">
                                <div class="task-inner d-flex flex-row">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightblue"></span>
                                    <span class="task-category">Работа</span>
                                </div>
                                <div class="task-due-date">
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="category-container">
                        <h5>Домашни задължения</h5>
                        <div class="category-tasks d-flex flex-column ">
                            <div class="task">
                                <div class="task-inner d-flex flex-row">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightblue"></span>
                                    <span class="task-category">Работа</span>
                                </div>
                                <div class="task-due-date">
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>
                            <div class="task">
                                <div class="task-inner d-flex flex-row">
                                    <span><i class="material-icons">check</i></span>
                                    <h6>Изхвърли боклука</h6>
                                </div>
                                <div class="task-color-category">
                                    <span class="task-color" style="background-color: lightblue"></span>
                                    <span class="task-category">Работа</span>
                                </div>
                                <div class="task-due-date">
                                    <p>До <span>06/06/2024</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="categories-space">
                <div class="all-categories">
                    <h5 class="text-center p-3">Всички категории</h5>
                </div>
                <div class="add-category-box">
                    <h5 class="text-center p-3">Добавяне на категория</h5>
                    <form id="add-cat" action="add-category.php" method="post" class="ps-5 pe-5 pb-5 pt-3">
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control" id="category-name" placeholder="Въведете име" name="category-name">
                            <label for="category-name">Име на категория</label>
                            <input type="submit" value="Добавяне">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>