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

class Router
{

    /**
     * gestionnaire de Controllers, permettant de connaitre le namespace
     * @var ControllerManager
     */
    protected $controller_manager;

    /**
     * @var Route[]
     */
    protected $routes;


    /**
     * @param $url
     * @return Controller
     * @throws \Exception
     */
    public function dispatch($url) {
        foreach($this -> routes as $route) {
            if($route -> match($url)) {
                $this -> execute($route);
                return;
            }
        }
    }

    /**
     * @param ControllerManager $controller_manager
     */
    public function setControllerManager(ControllerManager $controller_manager)
    {
        $this -> controller_manager = $controller_manager;
    }

    protected function getController($controller_name)
    {
        if(is_null($this -> controller_manager)) {
            throw new \Exception("Le gestionnaire de controlleur (ControlerManager) doit être défini");
        }
        return $this -> controller_manager -> getController($controller_name);
    }
    
    public function addRoute(Route $route) {
        $this -> routes[] = $route;
    }

    /**
     * Analyse l'URL, et renseigne $controller_name et $action_name, et éventuellement $parameters
     * @return mixed
     */
    protected function parseURL() {
        
    }

    private function execute(Route $route)
    {
        /** @var Controller $controller */
        $controller = $this -> getController($route -> getControllerName());

        $controller -> setParameters($route -> getParametres());

        $controller -> executeAction($route -> getAction());

    }
}