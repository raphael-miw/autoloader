<?php

/**
 * Created by PhpStorm.
 * User: raph
 * Date: 16/03/16
 * Time: 15:15
 */
namespace Blog\Controllers;

use Blog\Models\PostModel;
use Blog\View\BlogFrontView;
use Web\Controllers\Controller;
use Web\Core\Database;

class SimplepageController extends Controller
{

    /**
     * @var array
     * Liste des pages qu'on autorise
     */
    private $page_list = array("about","contact");
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

        $template_name = $this -> current_page;

        $vue = new BlogFrontView($template_name,$data);
        echo $vue -> render();
    }


    public function displayHomepageAction() {

        // récupération du dernier post
        $data_last_post = Database::getInstance()
            -> query("SELECT * FROM post ORDER BY date_post DESC LIMIT 1 ")
            -> fetch_object();

        // création du modele
        $last_post = new PostModel();
        $last_post -> hydrate($data_last_post);

        $data = array(
            "last_post" => $last_post
        );

        $vue = new BlogFrontView("index",$data);
        echo $vue -> render();
    }

}