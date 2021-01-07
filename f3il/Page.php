<?php
namespace f3il;

class Page {
    private static $_instance = null;
    private static $_viewFolder = null;
    private static $_templateFolder = null;
    private static $_appNamespace = null;

    protected $viewFile = null;
    protected $templateFile = null;
    protected $data = [];

    private function __construct() {}

    public static function getInstance() {
        if(is_null(self::$_instance)) {
            self::$_instance = new Page();
            self::$_instance->configure();
        }
        return self::$_instance;
    }

    private function configure() {
        $conf = Configuration::getInstance();
        self::$_templateFolder = '../'.$conf->app_folder.'/'.$conf->template_folder;
        self::$_viewFolder = '../'.$conf->app_folder.'/'.$conf->view_folder;
        self::$_appNamespace = $conf->app_namespace;
    }

    public function setView($viewName) {
        $viewFile = self::$_viewFolder.'/'.$viewName.'.view.php';
        if(!is_readable($viewFile)) {
            throw new Error('Page : fichier de view introuvable'.$viewFile);
        }
        $this->viewFile = realpath($viewFile);
        return $this;
    }

    public function setTemplate($templateName) {
        $templateFile = self::$_templateFolder.'/'.$templateName.'.template.php';
        if(!is_readable($templateFile)) {
            throw new Error('Page : fichier de template introuvable'.$templateFile);
        }
        $this->templateFile = realpath($templateFile);
        return $this;
    }

    public function init($templateName, $viewName) {
        $this->setTemplate($templateName)->setView($viewName);
        return $this;
    }

    public function render() {
        if(is_null($this->templateFile)) {
            throw new Error('Page : aucun template renseigné');
        }
        require $this->templateFile;
    }

    public function insertView() {
        if(is_null($this->viewFile)) {
            throw new Error('Page : aucune view renseignée');
        }
        require $this->viewFile;
    }

    public function __get($item) {
        if (!isset($this->data[$item])) {
            throw new Error('Page : clé inexistante '.$item);
        }
        return $this->data[$item];
    }

    public function __set($item, $value) {
        $this->data[$item] = $value;
    }

    public function __isset($item) {
        return isset($this->data[$item]);
    }

    public function insertModule($moduleName) {
        $moduleClass = self::$_appNamespace.'\\modules\\'.$moduleName;

        if(!class_exists($moduleClass)) {
            throw new Error('Page : aucune classe ne correspond au module '.$moduleName);
        }

        $interfaces = \class_implements($moduleClass);
        
        if(!isset($interfaces['f3il\Module'])) {
            throw new Error("Page : la classe $moduleClass ne respecte pas l'interface Module");
        }

        $objModule = new $moduleClass();
        $objModule->render();
    }
}
