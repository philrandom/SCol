<?php
namespace f3il;

class Authentication
{
    const SESSION_KEY = "f3il.authentication";

    private static $_instance;

    protected $provider = null;
    protected $credentialsInfo;
    protected $user = null;
    protected $salt = '';

    private function __construct(AuthenticationInterface $provider) {
        $this->provider = $provider;
        $this->credentialsInfo = $provider::auth_getCredentialsInfos();
        if(!$this->hasValidCredentialsKeys($this->credentialsInfo)) {
            throw new Error("Auth : provider incompatible");
        }

        if($this->isLoggedIn()) {
            $this->user = $provider::auth_getUserById($_SESSION[self::SESSION_KEY]);
            unset($this->user[$this->credentialsInfo['password']]);
        }

        $conf = Configuration::getInstance();
        if(isset($conf->auth_salt)) {
            $this->salt = $conf->auth_salt;
        }
    }

    private function hasValidCredentialsKeys($data) {
        $expectedKeys = ['id','login','password'];
        $credentialsInfoKeys = array_keys($data);
        return count(array_intersect($expectedKeys,$credentialsInfoKeys)) === count($expectedKeys);
    } 

    public static function getInstance() {
        if(is_null(self::$_instance)) {
            $conf = Configuration::getInstance();
            if(!isset($conf->auth_provider)) {
                throw new Error("Aucun provider renseigné");
            }
            try {
                $provider = new $conf->auth_provider();
            } catch(\Exception $exp) {
                throw new Error("Auth : erreur construction provider");
            }
            self::$_instance = new Authentication($provider);
        }
        return self::$_instance;
    }

    public function hash($password) {
        return hash('sha256', hash('sha256',$this->salt).$password);
    }

    public function login($login,$password) {
        $this->user = $this->provider::auth_getUserByLogin($login);
        // Pas d'utilisateur
        if(!$this->user) {
            die("pas d'utlisateur");
            return false;
        }
        // Concordance mdp
        if($this->hash($password) !== $this->user[$this->credentialsInfo['password']]) {
            die("mauvais mot de passe");
            return false;
        }

        $_SESSION = [];
        session_regenerate_id(true);
        $_SESSION[self::SESSION_KEY] = $this->user[$this->credentialsInfo['id']];
        unset($this->user[$this->credentialsInfo['password']]);

        return true;
    }

    public function logout() {
        $this->user = null;
        $_SESSION = [];
        session_regenerate_id(true);
    }

    public function isLoggedIn() {
        return isset($_SESSION[self::SESSION_KEY]);
    }

    public function getUser() {
        if(!$this->isLoggedIn()){
            throw new Error("Auth : aucun utilisateur connecté");
        }
        return $this->user;
    }

    public function getUserId() {
        if(!$this->isLoggedIn()){
            throw new Error("Auth : aucun utilisateur connecté");
        }
        return $_SESSION[self::SESSION_KEY];
    }
}