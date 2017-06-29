<?php
session_start();
define('ROOT', dirname(__DIR__));
use \app\core\Router;

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/router.php';
require_once 'core/Db.php';
require_once 'core/imageLoadResize.php';

// Не получилось настроить пути пришлось подключать через requre

//spl_autoload_register(function ($class) {
//    $file = str_replace('\\', '/', $class) . '.php';
//    if(is_file($file))
//    {
//        require_once $file;
//    }
//
//});

Router::start();