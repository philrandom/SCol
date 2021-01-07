<?php
namespace f3il;

use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;

class Application
{
    const DEBUG_MODE = "debug";
    const PRODUCTION_MODE = "production";
    const LOGGER_ON = "1";

    private static $_instance = null;
    private static $_appNamespace = null;
    private static $_defaultControllerName = null;
    private static $_runMode = self::PRODUCTION_MODE;
    private static $_logger = null;

    private function __construct() {}

    public static function getInstance() {
        if(is_null(self::$_instance)) {
            self::$_instance = new Application();
            self::configure();
        }
        return self::$_instance;
    }

    private static function configure() {
        $conf = Configuration::getInstance();
        self::$_appNamespace = $conf->app_namespace;
        self::$_defaultControllerName = $conf->default_controller;

        if(isset($conf->run_mode) && $conf->run_mode === self::DEBUG_MODE) {
            self::$_runMode = self::DEBUG_MODE;
            \error_reporting(E_ALL);
        } else {
            \error_reporting(0);
        }

        if(isset($conf->log_on_error) && $conf->log_on_error===self::LOGGER_ON) {
            self::startLogger();
        }
    }

    public static function startLogger() {
        self::$_logger = new Logger('f3il');
        self::$_logger->pushHandler(new StreamHandler('../log/app.log'));
    }

    public static function getLogger() {
        return self::$_logger;
    }

    public static function log($message,$data) {
        if(is_null(self::$_logger)) return;
        self::$_logger->error($message,$data);
    }

    public static function getRunMode() {
        return self::$_runMode;
    }

    private function getControllerClass($controllerName) {
        if($controllerName === 'error') {
            return 'f3il\ErrorController';
        }
        $controllerClass = self::$_appNamespace.'\\controllers\\'.$controllerName.'Controller';
        if(!class_exists($controllerClass)) {
            throw new Error('Application : contrôleur introuvable '.$controllerClass);
        }
        return $controllerClass;
    }

    public function run() {
        try {

        // récup dans GET du paramètre contrôleur
        $controllerName = filter_input(INPUT_GET, 'controller');
        if(is_null($controllerName)) {
            if(is_null(self::$_defaultControllerName)) {
                throw new Error('Application : aucun contrôleur renseigné');
            }
            $controllerName = self::$_defaultControllerName;
        }
        //Génération du nom de la classe du contrôleur
        $controllerClass = $this->getControllerClass($controllerName);

        //construire l'objet
        $controller = new $controllerClass();

        //Récupération de l'action à exécuter
        $actionName = filter_input(INPUT_GET,'action');
        if(is_null($actionName)) {
            $actionName = $controller->getDefaultActionName();
        }

        //Exécution de l'action
        $controller->execute($actionName);

        //Rendu de la page
        Page::getInstance()->render();

        } catch(Error $exp) {
            $exp->render();
        } catch(\Exception $exp) {
            self::log($exp->getMessage(),[
                'file' => $exp->getFile(),
                'line' => $exp->getLine()
            ]);
            if(self::$_runMode == self::DEBUG_MODE) {
                throw $exp;
            } else {
                self::redirect('?controller=error');
            }
        }
    }

    public static function redirect($url) {
        if(!headers_sent()) {
            header("HTTP/1.1 303 See Other");
            header("Location : ".$url);
            die();
        } else {
        ?>
        <script>
            window.location="<?php echo $url;?>";
        </script>
        <?php
        }
    }
}