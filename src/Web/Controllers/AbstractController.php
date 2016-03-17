<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 17/03/16
 * Time: 21:19
 */

namespace Web\Controllers;


abstract class AbstractController
{

    public function renderTpl($vue,$data=array()) {
        extract($data);

        ob_start();
        include "../views/$vue.phtml";
        return ob_get_clean();

    }
    
}