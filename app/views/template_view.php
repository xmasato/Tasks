<?php session_start() ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <title>Задачник</title>
    <link href="/assets/template/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/template/css/main.css">
</head>

<body>
<div class="wrapper">
    <div class="container">
        <div class="col-md-12">
        <div class="col-md-3 block-center">
            <a href="/"><h2>Задачи</h2></a>
        </div>
        <div class="col-md-3">
            <a href="/login"><h2>Админка</h2></a>
        </div>
        </div>
        <div class="btn-group">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                сортирока
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="/main/index/?sort=name">По имени</a></li>
                <li><a href="/main/index/?sort=email">По email</a></li>
                <li><a href="/main/index/?sort=done">По готовности</a></li>
            </ul>
        </div>
        <?php include $content_view ?>
    </div>
</div>

<div class="container form">
    <form action='/main' method='POST' enctype='multipart/form-data' name="form_task">
        <div class="col-md-6 form-line">
            <div class="form-group">
                <label for="user_name">Имя пользователя</label>
                <input type="text" class="form-control" name="user-name" id="user_name" placeholder=" Enter Name" required>
            </div>
            <div class="form-group">
                <label for="user_email">Email Address</label>
                <input type="email" class="form-control" name="user-email" id="user_email" placeholder=" Enter Email" required>
            </div>
            <div class="form-group">
                <label>Изображение</label>
                <input type="file" class="form-control" name="uploadfile" id="photo">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for ="user_text">Текс Задачи</label>
                <textarea  class="form-control" name="user-text" id="user_text" placeholder="Enter Your Message" rows="10" col="10" wrap="hard" required></textarea>
            </div>
        </div>
        <div class="col-lg-6">
            <button type="submit" class="btn btn-success submit" id="button" name="send" value="send">Добавить задачу</button>
            <a href="#myModal" class="btn btn-info" data-toggle="modal" id="preview">Предварительный просмотр</a>
        </div>
    </form>
</div>
<!-- Модальное окно для предварительного просмотра -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Предварительный просмотр</h4>
            </div>
            <div class="col-md-12 block">
                <div class="col-md-6">
                    <ul class="task">
                        <li class="user_name_popup"></li>
                        <li class="user_email_popup"></li>
                        <li class="user_task_popup"></li>
                    </ul>
                </div>
                <div class="col-md-6 popup"><img src="" alt="" id="image" width="240" height="240"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/assets/template/js/bootstrap.min.js"></script>
<script src="/assets/template/js/main.js"></script>

</body>

</html>