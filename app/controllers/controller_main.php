<?php
use app\core\imageLoadResize;

class Controller_Main extends app\core\controller {

    function __construct() {

        $this->model = new Model_Main();
        parent::__construct();
    }

    function action_index() {
        //вызываем пагинатор и список задач
        parent::action_index();
        $this->paginator['link'] = '/main/index/?page=';

        $this->view->generate('main_view.php', 'template_view.php', $this->tasks, $this->paginator);
    }

    //сохраняет задачу
    public function saveTask() {

        $this->name = htmlspecialchars($_POST['user-name']);
        $this->email = htmlspecialchars($_POST['user-email']);
        $this->text = htmlspecialchars($_POST['user-text']);
        //если имя файла будет занято произойдет редирект на главную  в imageLoadResize
        if(!empty($_FILES['uploadfile']['name'])) {
            $this->fileName = htmlspecialchars($_FILES['uploadfile']['name']);
            $this->fileTmpName = htmlspecialchars($_FILES['uploadfile']['tmp_name']);
            $this->fileType = htmlspecialchars($_FILES['uploadfile']['type']);
            $this->uploaddir =  'upload/'.$this->fileName;

            $img = new imageLoadResize($this->fileName, $this->fileTmpName, $this->fileType);
            $img->moveFile();
            $img->imgResize();
            header('Location:/');
        }

        $this->model->saveTask($this->name, $this->email, $this->text, $this->uploaddir);
    }

    protected function checkRightSortString ($sort) {
        $sort_list = ['name', 'email', 'done'];
        return in_array($sort, $sort_list);
    }
}