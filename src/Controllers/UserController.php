<?php

namespace root\src\Controllers;

use root\src\Controller;
use root\src\Models\User;

class UserController extends Controller {
    
    public function index_view() {
        $user = new User();
        $data = $user->showUsers();
        $user->getDB()->close();

        $this->render('user/index', ['users' => $data]);
    }

    public function register_view() {
        $this->render('user/register');
    }

    public function register($request) {
        $data = $request->req_body;
        $user = new User();

        $user->setEmail($data['email']);
        $user->setName($data['name']);
        $user->setPassword($data['password']);

        $user->storeUser();
    }
}