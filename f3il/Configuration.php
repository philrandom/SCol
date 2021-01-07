<?php
namespace f3il;

class Configuration {
    private static $_instance = null;
    private static $_inifile = null;

    private $data;

    private function __construct() {
        if(is_null(self::$_inifile)) {
            die("Configuration : ini non renseignée");
        }

        if(!is_readable(self::$_inifile)) {
            die("Configuration : ini non lisible");
        }

        $this->data = parse_ini_file(self::$_inifile);
        if(!$this->data) {
            die("Configuration : erreur lecture fichier ini");
        }
    }

    public static function setConfigurationFile($inifile) {
        self::$_inifile = $inifile;
    }

    public static function getInstance() {
        if(is_null(self::$_instance)) {
            self::$_instance = new Configuration();
        }
        return self::$_instance;
    }

    public function __get($item) {
        if(!isset($this->data[$item])) {
            die("Configuration : $item n'existe pas");
        }
        return $this->data[$item];
    }

    public function __isset($item) {
        return isset($this->data[$item]);
    }

    public function __set($item, $value) {
        die("configuration : modification de configuration interdite");
    }
}