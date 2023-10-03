<?php

namespace root\src\Services;

use root\src\Models\Tab;

class TabService {

    function __construct() {

    }

    public function index_view_service() {
        $tab = new Tab();
        $data = array();
        $message = 'success';

        try{
            $data = $tab->showTabs();
            $tab->getDB()->close();
        }
        catch(\Exception $err){
            $message = $err->getMessage();
        }

        return [
            'message' => $message,
            'tabs' => $data
        ];
    }
}

