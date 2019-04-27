<?php

namespace models;

use core\Model;

class ModelApi extends Model {

    public function __construct() {
	parent::__construct();
	$this->table = 'questions';
    }
    
    public function add($question){
	$query = "insert into ".$this->table." values (null, '{$question['author']}', '{$question['text']}');";
	$this->db->query($query);
    }
    
    public function addid($id){
	$query = "DELETE FROM `oct_mvc`.`questions` WHERE `questions`.`id` = {$id['id']};";
	$this->db->query($query);
    }

}
