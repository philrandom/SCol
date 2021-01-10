<?php

namespace app\modules;

use f3il\Module;
use f3il\Authentication;

class Datagrid implements Module
{
    public function render() {
        $auth = Authentication::getInstance();
        if(!$auth->isLoggedIn()) {
            return;
        }

        $datagrid = new \C_DataGrid("SELECT * FROM eleves2", "nom");

    }
}