<?php

class Model_Admin extends app\core\Model {
    public $table = 'tasks';

    public function doneTask($id) {

        $sql = "SELECT `done` FROM `tasks` WHERE id = {$id}";
        $done = $this->pdo->query($sql);
        $done = $done[0]['done'];
        // toogle для "Задача сделана"
        if(!$done) {
            $sqlInsert = "UPDATE `tasks` SET `done` = '1' WHERE `{$this->table}`.`id` = {$id}";
        } else {
            $sqlInsert = "UPDATE `tasks` SET `done` = '0' WHERE `{$this->table}`.`id` = {$id}";
        }

        $this->pdo->execute($sqlInsert);
    }

    public function editTask($id) {

        $sql = "SELECT * FROM {$this->table} WHERE `id` = {$id}";
        return $this->pdo->query($sql);
    }

    public function saveEditTask($name, $email, $text, $id, $uploaddir) {

        $sql = "UPDATE `tasks` SET `name`='{$name}',`email`='{$email}',`text`='{$text}',`img`='{$uploaddir}' WHERE id={$id}";
        $this->pdo->execute($sql);
    }

}
