<?php

namespace root\src\Routing;

use root\src\Controllers\TabController;

function addTabRoutes($router){
    $router->addRoute('/tab', TabController::class, 'index_view', 'GET');
}