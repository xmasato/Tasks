<?php
use app\core\imageLoadResize;
class Controller_Admin extends app\core\Controller {
    protected $id;
    protected $img;

    function __construct() {

        $this->model = new Model_Admin();
        parent::__construct();
    }

    function action_index() {
        //вызываем пагинатор и список задач
        parent::action_index();
        $this->paginator['link'] = '/admin/index/?page=';

        $this->view->generate('admin_view.php', 'adminTemplate_view.php', $this->tasks, $this->paginator);
    }
    // делаеть задание выполненым или отменяет
    function action_done() {

        $id = (int)$_GET['id'];
        $this->model->doneTask($id);
        header('Location:/admin');
    }

    function action_edit() {

        $id = (int)$_GET['id'];
        $editTask = $this->model->editTask($id);
        $editTask = $editTask[0];
        $this->view->generate('edit_view.php', 'adminTemplate_view.php', $editTask);
    }

    function action_saveEdit () {
       //var_dump($_POST);
        $this->name = htmlspecialchars($_POST['user-name']);
        $this->email = htmlspecialchars($_POST['user-email']);
        $this->text = htmlspecialchars($_POST['user-text']);
        $this->id = htmlspecialchars($_POST['user-id']);
        $this->img = htmlspecialchars($_POST['user-img']);

        //если имя файла будет занято произойдет редирект на главную  в imageLoadResize
        if(!empty($_FILES['uploadfile']['name'])) {
            $this->fileName = htmlspecialchars($_FILES['uploadfile']['name']);
            $this->fileTmpName = htmlspecialchars($_FILES['uploadfile']['tmp_name']);
            $this->fileType = htmlspecialchars($_FILES['uploadfile']['type']);
            $this->uploaddir =  'upload/'.$this->fileName;

            $img = new imageLoadResize($this->fileName, $this->fileTmpName, $this->fileType);
            $img->moveFile();
            $img->imgResize();
        }

        if(empty($this->uploaddir)) $this->uploaddir = $this->img; //если пользователь не менял изображение

        $this->model->saveEditTask($this->name, $this->email, $this->text, $this->id, $this->uploaddir);
        header('Location:/admin');
    }
}