<?php

/**
 * Created by PhpStorm.
 * User: raph
 * Date: 16/03/16
 * Time: 15:15
 */
namespace Blog\Controllers;

use Blog\View\BlogFrontView;
use Web\Controllers\Controller;

class SimplepageController extends Controller
{

    /**
     * @var array
     * Liste des pages qu'on autorise
     */
    private $page_list = array("blog","index","about","contact","post");
    private $current_page = null;

    public function displayAction()
    {
        if($this -> hasParameter("page")) {
            $page_name = $this -> getParameter("page");
            // test de l'existence de la page dans une liste prédéfinie
            if(in_array($page_name,$this -> page_list)) {
                $this -> current_page = $page_name;
            } else {
                $this -> current_page = "404";
            }
        } else {
            $this->current_page = "404";
        }
//        $page_name = isset($_GET["page"])? $_GET["page"] : "index";

        // affectation de variables utilisables dans les templates.
        $data = array(
            "date_du_jour" => date("Y-m-d"),
            "prenom" => "raphael"
        );

        $vue = new BlogFrontView($this -> current_page,$data);
        echo $vue -> render();
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