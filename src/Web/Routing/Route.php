<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 22/03/16
 * Time: 17:28
 */

namespace Web\Routing;


use Web\Controllers\ControllerManager;

class Route
{

    /**
     * @var string
     * Pattern de repérage de l'url, expression régulière
     */
    protected $pattern;

    /**
     * @var string
     * Nom du controlleur à instancier
     */
    protected $controller_name;

    /**
     * @var string
     * Nom de l'action a exécuter
     */
    protected $action;

    /**
     * paramètres à passer au controleur
     * @var array
     */
    protected $parametres = array();

    public function __construct($pattern,$controller_name,$action,$parametres = array())
    {
        $this->pattern = '#'.$pattern.'#';
        $this->controller_name = $controller_name;
        $this->action = $action;
        $this->parametres = $parametres;
    }

    public function match($url)
    {
        $result = preg_match($this -> pattern,$url,$matches);
        if($result) {
            // l'url correspond
            
            // récupération des éventuels paramètres
            foreach($this -> parametres as &$un_param) {
                // on remplace sur la partie qui a matché uniquement ($matches[0]) les variables
                // ex : "$1" => 45
                // peut sans doute être optimisé, car l'expression est rejouée plusieurs fois...
                $un_param = preg_replace($this -> pattern,$un_param,$matches[0]);
            }
            return true;
        }
        return false;
    }

    /**
     * @return string
     */
    public function getControllerName()
    {
        return $this->controller_name;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return array
     */
    public function getParametres()
    {
        return $this->parametres;
    }
}