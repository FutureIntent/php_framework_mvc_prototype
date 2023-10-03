<?php 

namespace root\src\Routing;

use root\src\Controllers\UserController;

function addUserRoutes($router) {
    $router->addRoute('/user', UserController::class, 'index_view', 'GET');

    $router->addRoute('/user/register', UserController::class, 'register_view', 'GET');
    $router->addRoute('/user/register', UserController::class, 'register_post', 'POST');
    
    $router->addRoute('/user/login', UserController::class, 'login_view', 'GET');
    $router->addRoute('/user/login', UserController::class, 'login_post', 'POST');
    
    $router->addRoute('/user/logout', UserController::class, 'logout_view', 'GET');
    $router->addRoute('/user/logout', UserController::class, 'logout_post', 'POST');
}