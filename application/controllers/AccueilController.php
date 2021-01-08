<?php
namespace app\controller;

use f3il\helpers\CsrfHelper;
use f3il\Error;

class AccueilController extends \f3il\Controller
{
    public function __construct()
    {
        $auth = \f3il\Authentication::getInstance();
            if(!$auth->isLoggedIn()) {
                \f3il\Application::redirect('?controller=index&action=index');
            }
    }
    
    public function getDefaultActionName() {
        return "lister";
    }

    public function listerAction() {
        $page = \f3il\Page::getInstance();
        $page->init('simple','accueil');
       // echo __METHOD__;
    }
}