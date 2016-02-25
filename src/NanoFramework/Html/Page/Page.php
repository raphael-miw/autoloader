<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 23/02/16
 * Time: 03:25
 */

namespace NanoFramework\Html\Page;


use NanoFramework\Html\SimpleTemplateLoader;

abstract class Page
{
    protected $request_url;
    protected $template_loader;

    public function __construct()
    {
        $this -> template_loader = new SimpleTemplateLoader("../templates");
    }

    public function __toString()
    {
        return "page de type ".get_class($this);
    }

    abstract public function getContenu();
    abstract public function getMetaDesc();
    abstract public function getTitle();
    abstract public function getUrl();

    public function render() {
        $data_page = array(
            "meta_desc" => $this -> getMetaDesc(),
            "title" => $this -> getTitle(),
            "body" => $this -> getContenu()
        );

        return $this -> template_loader -> render("modele.tpl.php",$data_page);

    }


    public function initialize()
    {
        $this -> checkUrl();
    }

    public function setRequestURL($url) {
        $this -> request_url = $url;
    }

    protected function checkUrl()
    {
        $url_attendue = $this -> getUrl();
        if( $url_attendue && $url_attendue != $this -> request_url) {
            header("Location: ".$url_attendue,true,302);
        }
    }
}