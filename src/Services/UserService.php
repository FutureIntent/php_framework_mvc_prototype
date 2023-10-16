<?php

namespace root\src\Services;

use root\src\Core\Response;
use root\src\Models\User;

use function root\src\Auth\authenticate;
use function root\src\Auth\deAuthenticate;

include_once('./src/Auth/session.php');

class UserService {

    function __construct() {

    }

    public function index_view_service() {
        $user = new User;
        $data = array();
        $message = 'success';

        try{
            $data = $user->showUsers();
            $user->getDB()->close();
        }
        catch(\Exception $err){
            $message = $err->getMessage();
        }

        return [
            'message' => $message,
            'users' => $data
        ];
    }

    public function register_post_service($request){
        $data = $request->req_body;
        $user = new User();

        $user->setEmail(strtolower($data['email']));
        $user->setName($data['name']);
        $user->setPassword($data['password']);

        try{
            $user->storeUser();
            $user->getDB()->close();
        }
        catch(\Exception $err){
            $res = new Response(500, ['message' => $err->getMessage()]);
            $res->sendStatusAndBody();
        }

        $res = new Response(200, ['message' => 'success']);
        $res->sendStatusAndBody();
    }

    public function login_post_service($request){
        $data = $request->req_body;
        $user = new User();

        $user->setEmail(strtolower($data['email']));
        $user->setPassword($data['password']);

        try{
            $result = $user->getByEmailAndPassword();
            if(!$result) {
                $res = new Response(200, [
                    'message' => 'Wrong credentials',
                    'data' => $result
                ]);
                $res -> sendStatusAndBody();
            }
            
            authenticate($result);

            $res = new Response(200, [
                'message' => 'Success',
                'data' => $result
            ]);
            $res -> sendStatusAndBody();
        }
        catch(\Exception $err){
            $res = new Response(500, ['message' => $err->getMessage()]);
            $res->sendStatusAndBody();
        }
    }

    public function logout_post_service(){
        deAuthenticate();

        $res = new Response(200, ['message' => 'Logged out']);
        $res->sendStatusAndBody();
    }

}