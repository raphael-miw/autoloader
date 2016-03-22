<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 22/03/16
 * Time: 20:51
 */

namespace  Web\View;

class FrontView extends SimpleView
{
    protected $wrapper_template_name = "root_model";
    protected $wrapper_content_variable = "html_content";

    // on "wrap" le contenu dans un "root_modele" qui contient les balises HTML de base
    public function render()
    {
        // 1 - rendu de la vue simple (le contenu)
        $html_content = parent::render(); 

        // 2 - rendu dun contenu inséré dans le root modele
        $wrapper_data = array(
            $this -> wrapper_content_variable => $html_content
        );

        $wrapper = new SimpleView($this -> wrapper_template_name,$wrapper_data);
        return $wrapper -> render();
    }

    /**
     * @param $string
     */
    protected function setWrapper($template_name,$content_var_name = "html_content")
    {
        $this -> wrapper_template_name = $template_name;
        $this -> wrapper_content_variable = $content_var_name;
    }
}