<?php

namespace root\src\Controllers;

use root\src\Core\Controller;
use root\src\Services\TabService;

use function root\src\Auth\verifyUser;

include_once('./src/Auth/verify.php');

class TabController extends Controller {

    public $tabService;

    function __construct() {
        $this->tabService = new TabService();
    }
    
    public function index_view() {
        verifyUser();

        $data = $this->tabService->index_view_service();

        $this->render('tab/index', [
            'message' => $data['message'],
            'tabs' => $data['tabs']
        ]);
    }

}