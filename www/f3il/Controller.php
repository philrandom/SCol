<?php
namespace f3il;

abstract class Controller
{
    public function getDefaultActionName() {
        throw new Error("Contrôleur : aucune action par défaut définie pour le contôleur ".get_class($this));
    }

    public function execute($actionName) {
        $actionMethod = $actionName.'Action';
        if(!\method_exists($this,$actionMethod)) {
            throw new Error("Controller : action indisponible '$actionName' pour le contrôleur ".get_class($this));
        }
        $this->$actionMethod();
    }
}