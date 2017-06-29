<?php
class Model_Login extends app\core\Model {
    public $table = 'users';

    public function loginCheck($login) {

        $sql = "SELECT `name`, `password` FROM `{$this->table}` WHERE `name` = '{$login}'";
        return  $this->pdo->query($sql);
    }
}