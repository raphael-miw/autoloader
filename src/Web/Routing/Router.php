<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 20/03/16
 * Time: 12:13
 */

namespace Web\Routing;



use Web\Controllers\Controller;
use Web\Controllers\ControllerManager;

abstract class Router
{

    /**
     * Url à analyser
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $controller_name = null;
    
    /**
     * @var array
     */
    protected $parameters = array();

    /**
     * @var string
     */
    protected $action_name= null;

    /**
     * gestionnaire de Controllers, permettant de connaitre le namespace
     * @var ControllerManager
     */
    protected $controller_manager;

    public function setUrl($url) {
        $this -> url = $url;
    }

    /**
     * @param $url
     * @return Controller
     * @throws \Exception
     */
    public function dispatch($url) {
        // 
        $this -> setUrl($url);
        $this -> parseURL();
        /** @var Controller $controller */
        $controller = $this -> getController();
        $controller -> setParameters($this -> parameters);
        $controller -> executeAction($this -> action_name);
    }

    /**
     * @param ControllerManager $controller_manager
     */
    public function setControllerManager(ControllerManager $controller_manager)
    {
        $this -> controller_manager = $controller_manager;
    }

    protected function getController()
    {
        if(is_null($this -> controller_manager)) {
            throw new \Exception("Le gestionnaire de controlleur (ControlerManager) doit être défini");
        }
        if(!is_null($this -> controller_name)) {
            return $this -> controller_manager -> getController($this->controller_name);
        } else {
            throw new \Exception("Controlleur non défini");
        }
    }

    /**
     * Analyse l'URL, et renseigne $controller_name et $action_name, et éventuellement $parameters
     * @return mixed
     */
    abstract protected function parseURL();
}