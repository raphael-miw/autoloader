<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 23/02/16
 * Time: 03:25
 */

namespace NanoFramework\Html\Page;


use NanoFramework\Html\SimpleTemplateLoader;

abstract class Controller
{
    protected $request_url;
    protected $template_loader;
    protected $data_page = array();

    public function __construct($tpl_path)
    {
        $this -> template_loader = new SimpleTemplateLoader($tpl_path);
    }

    public function __toString()
    {
        return "page de type ".get_class($this);
    }

    public function render() {
        return $this -> template_loader -> render("modele.tpl.php",$this -> data_page);
    }

    public function assign($data) {
        $this -> data_page = array_merge($this->data_page,$data);
    }


    abstract public function initialize();

}
