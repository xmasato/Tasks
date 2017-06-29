<?php

namespace app\core;

class Model {
    protected $pdo;
    protected $table; //таблица с которой работает модель

    public function __construct() {

        $this->pdo = Db::instance();
    }

    /**Возвращает все записи
     * @param $sort - для сортировки при выводе задач
     * @param $offset - сдвиг для пагинатора
     * @param $limit - лимит записей
     * @return array общее колличество задач в базе, задачи
     */
    public function findAll($sort, $offset = 1, $limit = 3)
    {
        $sql = "SELECT `id`, `name`, `email`, `text`, `img`, `done` FROM {$this->table} ORDER BY {$sort} ASC";
        $sql .= " LIMIT {$offset}, {$limit}";

        //для пагинатора
        $sqlcnt = "SELECT count('id') as cnt FROM `tasks`";
        $cnt = $this->pdo->query($sqlcnt);
        $allTasks = $this->pdo->query($sql);
        return [$cnt, $allTasks];
    }


}