<?php

namespace root\src\Core;

class Response {

    public $status;
    public $data;
    public $cookies;
    public $headers;

    function __construct($status, $data) {
        $this->status = $status;
        $this->data = $data;
    }

    public function sendStatusAndBody() {
        header("Content-type: application/json; charset=utf-8", true, $this -> status);
        echo json_encode($this->data);
        die();
    }
}