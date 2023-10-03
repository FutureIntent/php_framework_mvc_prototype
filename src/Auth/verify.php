<?php

namespace root\src\Auth;

use root\src\Core\Response;

function verifyUser() {
    if(!isset($_SESSION['auth']) || !$_SESSION['auth']){
        $res = new Response(401, ['message' => 'Unauthenticated']);
        $res -> sendStatusAndBody();
    }
}