<?php
namespace f3il;

class Error extends \Exception
{
    private $origin;
    protected $renderFile;

    public function __construct($message,$origin=null) {
        parent::__construct($message);
        $this->origin = $origin;
        $this->renderFile = "errors/html/error.html.php";
    }

    public function render() {
        Application::log(
            $this->message,[
                'file' => $this->getFile(),
                'line' => $this->getLine(),
            ]
            );

        switch(Application::getRunMode()) {
            case Application::DEBUG_MODE:
                $this->debugModeRender();
                break;
            default:
                $this->productionModeRender();
                
        }
    }

    private function debugModeRender() {
        $trace = $this->getTrace();
        $file = $this->getFile();
        $line = $this->getLine();
        $function = $trace[0]['function'].'()';
        require $this->renderFile;
        die("Allez, du nerf.");
    }

    private function productionModeRender() {
        Application::redirect('?controller=error');
    }
}
