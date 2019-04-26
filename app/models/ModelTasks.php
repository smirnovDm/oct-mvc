<?php

namespace models;

use core\Model;
use mysqli;

class ModelTasks extends Model {

    public function __construct() {
	parent::__construct();
	$this->table = 'tasks';
    }

    public function save($text) {
	$query = "INSERT INTO `tasks` (`id`, `name`) VALUES (NULL, '$text');";
	$result = $this->db->query($query);
    }
    public function saveEdit($text, $text_id){
        $query = "UPDATE `tasks` SET `name` = '$text' WHERE `tasks`.`id` = $text_id;";
        $result = $this->db->query($query);
    }

}
