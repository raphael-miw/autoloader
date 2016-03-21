<?php

namespace Blog\Routing;


use Web\Routing\Router;

class BlogRouter extends Router {

    /**
     * Anakyse l'URL, et renseigne controller_name et action_name
     * @return mixed
     */
    protected function parseURL()
    {
        if($this -> url == "/about") {
            $this -> parameters = array("page" => "about");
            $this -> controller_name = "simplepage";
            $this -> action_name = "display";
        }
    }
}