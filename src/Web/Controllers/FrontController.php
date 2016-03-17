<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 17/03/16
 * Time: 21:19
 */

namespace Web\Controllers;


abstract class FrontController extends AbstractController
{
    public function renderPage($view,$data) {
        // 1 - génération du contenu dynamique de la page
        $data_root_template = array(
            "title" => $this -> getTitle(),
            "html_content" => $this -> renderTpl($view,$data)
        );
        
        // 2 - intégration du contenu dans le templage général
        return $this -> renderTpl("root_model",$data_root_template);
    }

    abstract protected function getTitle();
}