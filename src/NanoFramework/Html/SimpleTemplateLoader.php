<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 25/02/16
 * Time: 21:40
 */

namespace NanoFramework\Html;


class SimpleTemplateLoader
{
    private $root_dir;

    public function __construct($root_dir) {

        $this->root_dir = rtrim($root_dir,"/")."/";
    }

    public function render($file_path,$data = array()) {
        extract($data);
        ob_start();
        include $this -> root_dir.$file_path;
        return ob_get_clean();
    }
}