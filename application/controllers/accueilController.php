<?php

namespace app\controllers;

use app\models\DatagridModel;

use f3il\Error;

class AccueilController extends \f3il\Controller
{
    public function getDefaultActionName()
    {
        return "Accueil";
    }

    public function accueilAction()
    {
        $auth = \f3il\Authentication::getInstance();
        if (!$auth->isLoggedIn())
            \f3il\Application::redirect('?controller=Index&action=index');

        $user = $auth->getUser();
        $page = \f3il\Page::getInstance();


        if ($user['type'] == 'administrateur') {
            $page->init('interfaceAdmin', 'accueil');
        } elseif ($user['type'] == 'enseignant') {
            $page->init('interfaceProf', 'accueil');
        } elseif ($user['type'] == 'viescolaire') {
            $page->init('interfaceSCol', 'accueil');
        } else {
            throw new Error("AccueilController : type d'utilisateur inconnu. Connexion refusée.");
        }

        $page->eleveList = DatagridModel::getAll();
    }

    public function creationAction() {
        $page = \f3il\Page::getInstance();
        $page->init('simple','creationReleve');
    }


}
