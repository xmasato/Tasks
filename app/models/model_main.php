<?php

class Model_Main extends app\core\Model {
    public $table = 'tasks';

    public function saveTask($name, $email, $text, $img) {

        $sql = "INSERT INTO `tasks` (`name`, `email`, `text`, `img`) VALUES ('{$name}', '{$email}', '{$text}', '{$img}')";
        $this->pdo->execute($sql);
    }

}