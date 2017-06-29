<?php session_start();
if(!$_SESSION['admin']) header('Location:/login');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <title>Админка</title>
    <link href="/assets/template/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/template/css/main.css">
</head>

<body>
<div class="wrapper">
    <div class="container">
        <a href="/"><h2>Задачи</h2></a>
        <?php include $content_view ?>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/assets/template/js/bootstrap.min.js"></script>

</body>

</html>