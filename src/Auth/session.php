<?php

namespace root\src\Auth;

function authenticate($user) {
    $_SESSION['auth'] = true;
    $_SESSION['id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['role'] = $user['role'];
}

function deAuthenticate() {
    $_SESSION['auth'] = false;
}