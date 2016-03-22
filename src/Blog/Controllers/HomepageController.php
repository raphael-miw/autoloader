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

    public function displayAction()
    {
        // affectation de variables utilisables dans les templates.
        $data = array(
            "date_du_jour" => date("Y-m-d H:i:s"),
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