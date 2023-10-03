<?php

namespace root\src\Routing;

use root\src\Core\Router;

include_once('./src/Routing/user/userRoutes.php');
include_once('./src/Routing/tab/tabRoutes.php');

$router = new Router();

addUserRoutes($router);
addTabRoutes($router);

return $router;