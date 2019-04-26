<?php

namespace controllers;

use core\Controller;
use models\ModelTasks;

class ControllerTasks extends Controller {

    public function __construct() {
        parent::__construct();
        $this->model = new ModelTasks();
    }

    public function action_index() {

        $this->view->tasks = $this->model->all();
        $this->view->render('tasks_index_view');
    }

    public function action_create() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->action_add();
        } else {
            $this->view->render('task_form_view');
        }
    }

    public function action_add() {
        $text = filter_input(INPUT_POST, 'text');

        if ($this->validate($text)) {
            $this->model->save($text);
            $url = $_SERVER['HTTP_ORIGIN'] . '/tasks';
            header("Location: " . $url);
        } else {
            die('Добавьте вопрос!');
        }
    }

    public function action_edit() {
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $this->saveEdition();
        }
        $this->view->render('tasks_edit_view');
    }

    private function saveEdition() {
        $text = filter_input(INPUT_POST, 'edit_text');
        $text_id = filter_input(INPUT_POST, 'task_id');
        if ($this->validate($text)) {
            $this->model->saveEdit($text, $text_id);
            $url = $_SERVER['HTTP_ORIGIN'] . '/tasks';
            header("Location: " . $url);
        }
    }
    private function validate($text){
        if(empty($text)){
            return false;
        }
        return true;
    }

}

//UPDATE `tasks` SET `name` = 'about me' WHERE `tasks`.`id` = 3;