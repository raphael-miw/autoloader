<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 22/03/16
 * Time: 13:02
 */

namespace Web\View;


class View
{
    // static pour simplifier, mais il faudra éviter (cf injection de dépendances)
    /** @var string  */
    public static $default_views_path = "views/";

    public $views_path = null;

    public function __construct()
    {

    }

    /**
     * @param string $views_path
     * @return View
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

    /**
     * @param $vue
     * @param array $data
     * @return string (HTML ?)
     */
    public function renderTpl($vue,$data=array()) {
        extract($data);

        ob_start();
        include $this -> getViewsPath().$vue.".phtml";
        return ob_get_clean();

    }
}