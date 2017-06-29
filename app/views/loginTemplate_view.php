<?php session_start();
if($_SESSION['admin']) header('Location:/admin');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <title>Авторизация</title>
    <link href="/assets/template/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/template/css/login.css">
</head>

<body>


<div class="container">
    <?php include $content_view ?>
        <form class="form-signin" action='/login/login' method='POST'>
            <h2 class="form-signin-heading"><a href="/login/login">Вернуться к задачам</a></h2>
            <h2 class="form-signin-heading">Вход в Админку</h2>
            <input type="text" class="form-control" placeholder="Логин" required="" autofocus="" name="login">
            <input type="password" class="form-control" placeholder="Пароль" required="" name="password">
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="do_login" value="login">Войти</button>
        </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/assets/template/js/bootstrap.min.js"></script>

</body>

</html>