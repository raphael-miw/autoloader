<?php
use Web\Controllers\FrontController;

/**
 * Created by PhpStorm.
 * User: raph
 * Date: 16/03/16
 * Time: 15:15
 */
namespace Web\Controllers;

class SimplepageController extends FrontController
{

    private $page_list = array("blog","index","about","contact","post");
    private $current_page = null;

    public function displayAction()
    {

        $page_name = isset($_GET["page"])? $_GET["page"] : "index";
        if(in_array($page_name,$this -> page_list)) {
            $this -> current_page = $page_name;
        } else {
            $this -> current_page = "404";
        }

        $data = array(
            "date_du_jour" => date("Y-m-d"),
            "prenom" => "raphael"
        );

        $html =  $this -> renderPage($this -> current_page,$data);

        echo $html ;
    }

    protected function getTitle()
    {
        switch($this -> current_page) {
            case "blog":
                return "le blog";
            case "index":
                return "Welcome !";
            case "about":
                return "à propos ...";
            case "contact":
                return "contactez-nous.";
            default:
                return "Page not found";
        }
    }
}