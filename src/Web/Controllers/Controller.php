<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 17/03/16
 * Time: 21:19
 */

namespace Web\Controllers;


abstract class Controller
{
    // static pour simplifier, mais il faudra éviter (cf injection de dépendances)
    /** @var string  */
    public static $default_views_path = "views/";

    public $views_path = null;

    public function renderTpl($vue,$data=array()) {
        extract($data);

        ob_start();
        include $this -> getViewsPath().$vue.".phtml";
        return ob_get_clean();

    }

    public function executeAction($action_name)
    {
        $method_name = strtolower($action_name)."Action";
        if(method_exists($this,$method_name)) {
//            return $this -> {$method_name}();
            return call_user_func(array($this,$method_name));
        } else {
            throw new \Exception("l'action $action_name n'existe pas dans le controleur ".get_class($this));
        }
    }

    protected $parameters = array();

    //    gestion des paramètres

    /**
     * Affectation de l'ensemble des paramètres du controleur
     * @param $params
     * ex : array(
     *      "param_name" => "param_value",
     *      "param_name" => "param_value",
     *  )
     */
    public function setParameters($params) {
        $this -> parameters = $params;
    }

    /**
     * Affectation d'un paramètre en particulier
     * @param $parameter_name
     * @param $parameter_value
     */
    public function setParameter($parameter_name, $parameter_value)
    {
        $this -> parameters[$parameter_name] = $parameter_value;
    }

    /**
     * @param $parameter_name
     * @return bool
     */
    public function hasParameter($parameter_name) {
        return isset($this -> parameters[$parameter_name]);
    }

    /**
     * @param $parameter_name
     * @return mixed
     */
    public function getParameter($parameter_name) {
        return $this -> parameters[$parameter_name];
    }

    /**
     * @param string $views_path
     * @return Controller
     */
    public function setViewsPath($views_path)
    {
        $this->views_path = $views_path;
        return $this;
    }

    /**
     * @return null
     */
    public function getViewsPath()
    {
        if(!is_null($this->views_path)) {
            return $this->views_path;
        }
        return self::$default_views_path;
    }

}