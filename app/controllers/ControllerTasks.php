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
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view->tasks = $this->model->all();
            $this->view->render('tasks_index_view');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $url = $_SERVER['HTTP_REFERER'] . '/add';
            header("Location: " . $url);
        }
    }

    public function action_add() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view->render('task_form_view');
             
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $text = filter_input(INPUT_POST, 'text');
            $this->model->save($text);
            $url = $_SERVER['HTTP_ORIGIN'].'/tasks';
            header("Location: ".$url);
        }
    }
}
