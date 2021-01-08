<?php
namespace app\controllers;

use app\models\UtilisateursModel;
use f3il\helpers\CsrfHelper;
use f3il\Error;

class IndexController extends \f3il\Controller
{
    public function getDefaultActionName()
    {
        return "index";
    }

    public function indexAction() {
        $auth = \f3il\Authentication::getInstance();
        if($auth->isLoggedIn()) {
            \f3il\Application::redirect('?controller=accueil&action=accueil');
        }

        $page = \f3il\Page::getInstance();
        $page->init('simple','index');

        $page->login = "";
        $page->password = "";

        if($_SERVER['REQUEST_METHOD']!='POST') return;

        if(!CsrfHelper::checkToken()) {
            throw new Error('Formulaire rejeté');
        }

        $page->login = filter_input(INPUT_POST,'login');
        $page->password = filter_input(INPUT_POST,'password');

        if(trim($page->login) == "") {
            $page->formMessage = "Login manquant";
            return;
        }

        if(trim($page->password) == "") {
            $page->formMessage = "Mot de passe manquant";
            return;
        }

        $auth = \f3il\Authentication::getInstance();
        if(!$auth->login($page->login,$page->password)) {
            $page->formMessage = "Erreur login ou mot de passe";
            return;
        }

        \f3il\Application::redirect('?controller=accueil&action=accueil');
    }

    public function logoutAction() {
        $auth = \f3il\Authentication::getInstance();
        $auth->logout();
        \f3il\Application::redirect('?controller=index&action=index');
    }

    public function demoAction() {
        $auth = \f3il\Authentication::getInstance();
        var_dump($auth);
        die();
    }
}