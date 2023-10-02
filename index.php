<?php

use root\src\Request;

use function root\src\Helpers\substrParams;

require 'vendor/autoload.php';

$req_uri = $_SERVER['REQUEST_URI'];
$req_method = $_SERVER['REQUEST_METHOD'];
$req_headers = getallheaders();
$req_body = json_decode(file_get_contents('php://input'), true);
$req_params = array();
$req_cookies = $_COOKIE;

array_key_exists('QUERY_STRING', $_SERVER) && parse_str($_SERVER['QUERY_STRING'], $req_params);
count($req_params) > 0 && $req_uri = substrParams($req_uri);

$request = new Request($req_uri, $req_method, $req_headers, $req_body, $req_params, $req_cookies);

$router = require 'src/Routing/routes.php';
$router->dispatch($request);

// $db_con = new Database();
// print_r($db_con);