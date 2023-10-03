<?php

namespace root\src\Controllers;

use root\src\Core\Controller;
use root\src\Services\UserService;

use function root\src\Auth\verifyUser;

include_once('./src/Auth/verify.php');

class UserController extends Controller {

    public $userService;

    function __construct() {
        $this->userService = new UserService();
    }
    
    public function index_view() {
        verifyUser();
        
        $data = $this->userService->index_view_service();

        $this->render('user/index', [
            'message' => $data['message'],
            'users' => $data['users']
        ]);
    }

    public function register_view() {
        $this->render('user/register');
    }

    public function register_post($request) {
        $this->userService->register_post_service($request);
    }

    public function login_view() {
        $this->render('user/login');
    }

    public function login_post($request) {
        $this->userService->login_post_service($request);
    }

    public function logout_view() {
        $this->render('user/logout');
    }

    public function logout_post() {
        $this->userService->logout_post_service();
    }
}