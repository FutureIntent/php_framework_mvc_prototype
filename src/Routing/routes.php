<?php

namespace root\src\Routing;

use root\src\Router;
use root\src\Controllers\UserController;

$router = new Router();

$router->addRoute('/user', UserController::class, 'index_view', 'GET');
$router->addRoute('/user/register', UserController::class, 'register_view', 'GET');
$router->addRoute('/user/register', UserController::class, 'register', 'POST');

return $router;