<?php

class Controller_Login extends app\core\controller {
     protected $login;
     protected $password;

    function __construct() {

        $this->model = new Model_Login();
        parent::__construct();
    }

    function action_index() {

        $this->view->generate('login_view.php', 'loginTemplate_view.php');
    }

    function action_login() {
        //проверка отправки с нашей формы
        if( $_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['do_login'] === 'login' ) {
            $this->login = htmlspecialchars($_POST['login']);
            $this->password = htmlspecialchars($_POST['password']);
        } else {
            header('Location:/');
        }
        //сравнение данных пользователя
       $result = $this->model->loginCheck($this->login, $this->password);
       if($result){
            $bd_login = $result[0]['name'];
            $bd_password = $result[0]['password'];
           //пароль в базе захеширован passwor password_hash()
           if($this->login == $bd_login && password_verify($this->password, $bd_password)) {
               $_SESSION['admin'] = true;
               header('Location:/admin');
           } else {
               header('Location:/login');
           }
       } else {
          header('Location:/login');
       }
        exit();
    }
}