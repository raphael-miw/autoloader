<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 22/03/16
 * Time: 20:51
 */

namespace  Web\View;

use Web\View\Data\FrontViewData;

class FrontView extends SimpleView
{
    protected $wrapper_template_name = "root_model";
    protected $wrapper_content_variable = "html_content";

    /**
     * @var FrontViewData
     */
    protected $wrapper_data = null;

    /**
     * @var SimpleView
     */
    protected $wrapper_view = null;

    // on "wrap" le contenu dans un "root_modele" qui contient les balises HTML de base
    public function render()
    {
        // 1 - rendu de la vue simple (le contenu)
        $html_content = parent::render(); 

        if(is_null($this -> wrapper_view)) {
            throw new \Exception("le wrapper n'a pas été défini");
        }
        // 2 - rendu dun contenu inséré dans le root modele
        $this -> wrapper_view -> addData($this -> wrapper_data);
        $this -> wrapper_view -> assign($this -> wrapper_content_variable,$html_content);

        return $this -> wrapper_view -> render();
    }
    
    public function setWrapperData(FrontViewData $data) {
        $this -> wrapper_data = $data;
    }

    /**
     * @param $string
     */
    protected function setWrapper($template_name,$content_var_name = "html_content")
    {
        $this -> wrapper_view = new SimpleView($template_name);
        $this -> wrapper_content_variable = $content_var_name;
    }
}