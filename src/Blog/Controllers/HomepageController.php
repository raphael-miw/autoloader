<?php

/**
 * Created by PhpStorm.
 * User: raph
 * Date: 16/03/16
 * Time: 15:15
 */
namespace Blog\Controllers;

use Web\Controllers\FrontController;

class HomepageController extends FrontController
{

    private $page_list = array("blog","index","about","contact","post");
    private $current_page = null;

    public function displayAction()
    {
        // affectation de variables utilisables dans les templates.
        $data = array(
            "date_du_jour" => date("Y-m-d"),
        );

        // rendu de la page
        $html =  $this -> renderPage("index",$data);

        // affichage de la page
        echo $html ;
    }

    protected function getTitle()
    {
        return "Welcome !";
    }
}