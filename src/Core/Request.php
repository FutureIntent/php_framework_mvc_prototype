<?php

namespace root\src\Core;

class Request {

    public $req_uri;
    public $req_method;
    public $req_headers;
    public $req_body;
    public $req_params;
    public $req_cookies;

    function __construct($req_uri, $req_method, $req_headers, $req_body, $req_params, $req_cookies) {
        $this -> req_uri = $req_uri;
        $this -> req_method = $req_method;
        $this -> req_headers = $req_headers;
        $this -> req_body = $req_body;
        $this -> req_params = $req_params;
        $this -> req_cookies = $req_cookies;
    }
}