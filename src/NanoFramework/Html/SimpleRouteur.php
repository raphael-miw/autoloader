<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 25/02/16
 * Time: 21:25
 */

namespace NanoFramework\Html;


use NanoFramework\Html\Page\Controller;

abstract class SimpleRouteur
{
    /** @var  string
     * url à analyser*/
    protected $url;

    public function __construct()
    {
    }

    /**
     * @param $match
     * @param $controller
     * TODO
     */
    public function addRoute($match,$controller) {

    }
    /** @return Controller */
    abstract public function getPage();


    /**
     * initialisation de l'URL demandée par le client
     */
    public function initCurrentURL()
    {
        $parsed = parse_url($_SERVER["REQUEST_URI"]);
        $this -> setUrl($parsed["path"]);
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
}