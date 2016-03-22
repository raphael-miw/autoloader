<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 21/03/16
 * Time: 19:59
 */

namespace Web\Controllers;


class ControllerManager {

    private $controller_namespace = "";

    public function __construct($controller_namespace)
    {
        $this->controller_namespace = $controller_namespace;
    }

    /**
     * @param $controller_name
     * @return Controller
     * @throws \Exception
     */
    public function getController($controller_name) {
        if($this -> controller_exists($controller_name)) {
            $class_name = $this -> getFullControllerClass($controller_name);
            return new $class_name();
        } else {
            throw new \Exception("le controleur $controller_name n'existe pas.");
        }
    }

    /**
     * @param $controller_name
     * @return bool
     */
    private function controller_exists($controller_name)
    {
        // ex : simplepage => \Blog\Controllers\SimplepageController
        $full_controller_name = $this -> getFullControllerClass($controller_name);
        
        if(class_exists($full_controller_name)) {
            return true;
        }
        return false;
    }

    /**
     * @param $controller_name
     * @return string
     * ex : simplepage => \Blog\Controllers\SimplepageController
     */
    private function getFullControllerClass($controller_name)
    {
        return $this->controller_namespace.ucfirst(strtolower($controller_name))."Controller";
    }
}