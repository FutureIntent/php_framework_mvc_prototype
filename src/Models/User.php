<?php

namespace root\src\Models;

use root\src\Database;

class User {

    private $id;
    private $name;
    private $email;
    private $password;
    private $role;

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    //GETTERS
    public function getId(){
        return $this->id;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getName(){
        return $this->name;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getRole(){
        return $this->role;
    }

    public function getDB() {
        return $this->db;
    }

    //SETTERS
    public function setEmail($email){
        $this->email = $email;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setRole($role){
        $this->role = $role;
    }

    //TO ARRAY
    public function toArray() {
        return get_object_vars($this);
    }

    //REPO METHODS
    public function showUsers() {
        $sql = "SELECT * from user";
        $result = $this->db->query($sql);
        $dataSet = array();

        while($current = $result->fetch_assoc()) array_push($dataSet, $current);
        
        return $dataSet;
    }

    public function storeUser() {
        $email = strtolower($this->email);
        $name = $this->name;
        $password = $this->password;
        $role = 'user';

        try {
            $sql = "INSERT INTO user (email, name, password, role) VALUES ('$email', '$name', '$password', '$role')";
            $this->db->query($sql);
        }
        catch(\Exception $err){
            header("Content-type: application/json; charset=utf-8", true, 500);
            echo json_encode(array(
                'message' => $err->getMessage()
            ));
            die();
        }

        header("Content-type: application/json; charset=utf-8", true, 200);
        echo json_encode(array(
            'message' => 'success'
        ));
        die();
    }
}