<?php

namespace root\src;

include './src/Helpers/urlQuery.php';

class Router {
    protected $routes = [];

    public function addRoute($route, $controller, $action, $method) {
        $this->routes[$method][$route] = [
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function dispatch($request) {

        if (array_key_exists($request -> req_uri, $this->routes[$request -> req_method])) {
            $controller = $this -> routes[$request -> req_method][$request -> req_uri]['controller'];
            $action = $this -> routes[$request -> req_method][$request -> req_uri]['action'];

            $controller = new $controller();
            $controller -> $action($request);
        } else {
            http_response_code(404);
            throw new \Exception("No route found for URI: {$request -> req_uri}");
        }
    }
}