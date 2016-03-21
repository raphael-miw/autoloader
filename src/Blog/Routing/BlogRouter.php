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
        if(preg_match("#/post/([0-9]+)#",$this -> url,$matches)) {
            $this -> parameters = array("id_post" => (int)$matches[1]);
            $this -> controller_name = "post";
            $this -> action_name = "detail";

        } else {
            switch($this -> url) {
                case "/contact":
                    $this -> parameters = array("page" => "contact");
                    $this -> controller_name = "simplepage";
                    $this -> action_name = "display";
                    break;
                case "/about":
                    $this -> parameters = array("page" => "about");
                    $this -> controller_name = "simplepage";
                    $this -> action_name = "display";
                    break;
                case "/":
                    $this -> parameters = array("page" => "index");
                    $this -> controller_name = "simplepage";
                    $this -> action_name = "display";
                    break;
                case "/le-blog":
    //                $this -> parameters = array("page" => "index");
                    $this -> controller_name = "blog";
                    $this -> action_name = "list";
                    break;
                default:
                    $this -> parameters = array("page" => "404");
                    $this -> controller_name = "simplepage";
                    $this -> action_name = "display";
                    break;
            }
        }
    }
}