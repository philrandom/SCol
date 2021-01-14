<?php

namespace app\controllers;

use f3il\Messenger;
use app\models\DatagridModel;
use app\models\UtilisateursModel;
use f3il\Error;
use f3il\Authentication;

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
            $page->init('interfaceAdmin', 'admin');
        } elseif ($user['type'] == 'enseignant') {
            $page->init('interfaceProf', 'accueil');
        } elseif ($user['type'] == 'viescolaire') {
            $page->init('interfaceSCol', 'accueil');
        } else {
            throw new Error("AccueilController : type d'utilisateur inconnu. Connexion refusée.");
        }

        $page->eleveList = DatagridModel::getAll();
        $page->utilisateurs = UtilisateursModel::getAllUsers();
        
    }

    public function creationAction() {
        $page = \f3il\Page::getInstance();
        $page->init('simple','creationReleve');
    }

    public function formulaire($data,$savingFunction,$redirect) {
        // Réglages de base
        $page = \f3il\Page::getInstance();
        $page->init('interfaceAdmin','user-form');

        // Préparation des données
        $page->identifiant = $data["identifiant"];
        $page->type = $data["type"];
        $page->motdepasse = $data["motdepasse"];

        // Si le formulaire n'est pas envoyé
        if($_SERVER['REQUEST_METHOD']!=='POST') {
            return;
        }

        // Vérification du token CSRF
        if(!\f3il\helpers\CsrfHelper::checkToken()) {
            throw new \f3il\Error("Formulaire rejeté");
        }

        // Récuparation des données
        $page->identifiant = filter_input(INPUT_POST,'identifiant');
        $page->type = filter_input(INPUT_POST,'type');
        $page->motdepasse = filter_input(INPUT_POST,'motdepasse');

        // Validation des données
        if(strlen(trim($page->identifiant)) < 3) {
            $page->formMessage = "Erreur : veuillez fournir un identifiant de 3 caractères minimum";
            return;
        }
        if(filter_var($page->type) !== "administrateur" && filter_var($page->type) !== "enseignant" && filter_var($page->type) !== "viescolaire") {
            $page->formMessage = "Erreur : veuillez fournir un type d'utilisateur valide : administrateur, enseignant ou viescolaire";
            return;
        }
        if(strlen(trim($page->motdepasse)) < 5) {
            $page->formMessage = "Erreur : veuillez fournir un mot de passe de 5 caractères minimum";
            return;
        }

        // Enregistrement des données
        $savingFunction($page);

        \f3il\Application::redirect($redirect);
    }

    public function ajouterAction() {
        $this->formulaire(
            [
                "identifiant" => "",
                "type" => "",
                "motdepasse" => ""
            ],
            function ($page) {
                UtilisateursModel::insert([
                    "identifiant" => $page->identifiant,
                    "type" => $page->type,
                    "motdepasse" => $page->motdepasse
                ]);
                Messenger::setMessage("Utilisateur \"{$page->identifiant}\" enregistré");
            },
            "?controller=accueil&action=accueil"
        );
    }

    public function editerAction() {
        $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
        if(!$id) {
            die("id manquant ou incorrect");
        }
        
        $utilisateur = UtilisateursModel::get($id);
        if(!$utilisateur) {
            die("Utilisateur inexistant");
        }

        $this->formulaire(
            $utilisateur,
            function ($page) use ($id) {
                UtilisateursModel::update($id,[
                    "identifiant" => $page->identifiant,
                    "type" => $page->type,
                    "motdepasse" => $page->motdepasse
                ]);
                Messenger::setMessage("Utilisateur \"{$page->description}\" modifié");
            },
            "?controller=accueil&action=accueil"
        );
    }



}
