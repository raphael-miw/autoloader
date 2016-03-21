<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 17/03/16
 * Time: 21:19
 */

namespace Web\Controllers;


abstract class FrontController extends Controller
{
    public static $default_root_view = "root_model";

    protected $root_view = null;

    public function renderPage($view,$data) {
        // 1 - génération du contenu dynamique de la page
        $data_root_template = array(
            "title" => $this -> getTitle(),                         // balise <title>
            "html_content" => $this -> renderTpl($view,$data)       // contenu variable de la page
        );
        
        // 2 - intégration du contenu dans le templage général
        return $this -> renderTpl(self::$default_root_view,$data_root_template);
    }

    abstract protected function getTitle();

    /**
     * @param null $root_view
     * @return FrontController
     */
    public function setRootView($root_view)
    {
        $this->root_view = $root_view;
        return $this;
    }

    /**
     * @return null
     */
    public function getRootView()
    {
        if(!is_null($this->root_view)) {
            return $this->root_view;
        } else {
            return self::$default_root_view;
        }
    }
}