<?php

namespace root\src\Models;

use root\src\Core\Database;

class Tab {

    private $id;
    private $header;
    private $content;
    private $parent_id;
    private $user_id;

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    //GETTERS
    public function getId(){
        return $this->id;
    }

    public function getHeader(){
        return $this->header;
    }

    public function getContent(){
        return $this->content;
    }

    public function getParentId(){
        return $this->parent_id;
    }

    public function getUserId(){
        return $this->user_id;
    }

    public function getDB() {
        return $this->db;
    }

    //SETTERS
    public function setId($id){
        $this->id = $id;
    }

    public function setHeader($header){
        $this->header = $header;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function setParentId($parent_id){
        $this->parent_id = $parent_id;
    }

    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    //TO ARRAY
    public function toArray() {
        return get_object_vars($this);
    }

    //REPO METHODS
    public function showTabs() {
        $dataSet = array();

        $sql = "SELECT * from tabs WHERE user_id = {$this->user_id}";
        $result = $this->db->query($sql);

        while($current = $result->fetch_assoc()) array_push($dataSet, $current);
        
        return $dataSet;
    }

}