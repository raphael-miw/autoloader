<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 25/02/16
 * Time: 21:34
 */

namespace MyWebsite\Pages;


use NanoFramework\Html\Page\FrontController;

class ControllerSimpleHTML extends FrontController
{

    protected $root_dir = null;

    public function setRootDir($root_dir)
    {
        $this->root_dir = rtrim($root_dir, "/") . "/";
    }

    public function getContenu()
    {
        if (empty($this->file)) {

        }
        if (file_exists($this->file)) {
            return file_get_contents($this->file);
        }
        return "imple page " . $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        if (!empty($this->url)) {
            $this->file = $this->root_dir . $this->url . ".html";
        } else {
            $this->file = $this->root_dir . "homepage.html";
        }
    }

    public function getMetaDesc()
    {
        return "desc " . $this->url;
    }

    public function getTitle()
    {
        return "title " . $this->url;
    }

    public function getUrl()
    {
        if (!empty($this->url) && file_exists($this->file)) {
            return "/" . $this->url . ".php";
        }
        return "/";
    }
}