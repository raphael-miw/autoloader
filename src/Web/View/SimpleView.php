<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 22/03/16
 * Time: 13:02
 */

namespace Web\View;


class SimpleView
{
    // static pour simplifier, mais il faudra éviter (cf injection de dépendances)
    /** @var string  */
    public static $default_views_path = "views/";

    public $views_path = null;

    protected $template_extension = "phtml";

    private $template;
    /**
     * @var array
     */
    private $data;

    public function __construct($template, $data = array()) {

        $this->template = $template;
        $this->data = $data;
    }


    /**
     * @param string $views_path
     * @return SimpleView
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
    public function render() {
        return $this -> renderTpl($this -> template, $this -> data);
    }

    /**
     * @param $template
     * @param array $data
     * @return string
     * Cette méthode ne peut pas être surchargée (final)
     */
    public final function renderTpl($template, $data=array()) {
        extract($data);
        ob_start();
        include $this -> getViewsPath().$template.".".$this->template_extension;
        return ob_get_clean();
    }

    /**
     * @param string $template_extension
     */
    public function setTemplateExtension($template_extension)
    {
        $this->template_extension = $template_extension;
    }
}