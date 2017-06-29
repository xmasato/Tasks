<?php
namespace app\core;

class Controller {
    protected $model;
    protected $view;
    protected $paginator = [];
    protected $allCnt;
    protected $tasks;
    protected $name;
    protected $email;
    protected $text;
    protected $fileName;
    protected $fileTmpName;
    protected $fileType;
    protected $uploaddir;
    protected $sort;

    function __construct() {

        $this->view = new View();
    }

    function action_index() {
        // передаю по сессии сортировку
        if( $_SERVER['REQUEST_METHOD'] === 'GET') {
            if(isset($_GET['sort']) && $this->checkRightSortString($_GET['sort'])) {
                $_SESSION['sort'] = $_GET['sort'];
            } else {
                $_SESSION['sort'] = 'id';
            }
        }

        $this->sort = $_SESSION['sort'];
        //Пагинатор
        $this->paginator['perPage'] = 3;
        $this->paginator['currentPage'] = isset($_GET['page']) ? $_GET['page'] : 1;
        $this->paginator['offset'] = ($this->paginator['currentPage'] * $this->paginator['perPage']) - $this->paginator['perPage'];

        // получаем список задач
        list($this->allCnt, $this->tasks) = $this->model->findAll($this->sort, $this->paginator['offset'], $this->paginator['perPage']);

        //забираем значение из массива
        $this->allCnt = $this->allCnt[0]['cnt'];

        $this->paginator['pageCnt'] = ceil($this->allCnt / $this->paginator['perPage']);
    }
}