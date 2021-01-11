<?php
namespace app\controllers;

use app\models\DatagridModel;
use app\models\UtilisateursModel;
use f3il\helpers\CsrfHelper;
use f3il\Error;

class AccueilController extends \f3il\Controller
{
    public function getDefaultActionName()
    {
        return "Accueil";
    }

    public function accueilAction() {
        $auth = \f3il\Authentication::getInstance();
        if (!$auth->isLoggedIn()) 
            \f3il\Application::redirect('?controller=Index&action=index');

        $user = $auth->getUser();
        $page = \f3il\Page::getInstance();

	if ($user['type'] == 'administrateur') {
		$page->init('interfaceAdmin', 'accueil');
	} elseif($user['type'] == 'enseignant') {
		$page->init('interfaceSCol', 'accueil');
	} else {
		die("Connexion absurde");
    }

    $page->eleveList = DatagridModel::getAll();
    }

    
}
