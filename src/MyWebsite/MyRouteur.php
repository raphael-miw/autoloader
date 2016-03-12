<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 25/02/16
 * Time: 22:27
 */

namespace MyWebsite;


use NanoFramework\Html\Page\Controller;
use MyWebsite\Pages\ControllerRealisation;
use MyWebsite\Pages\ControllerSimpleHTML;
use NanoFramework\Html\SimpleRouteur;

class MyRouteur extends SimpleRouteur
{
    /**
     * @return Controller
     */
    public function getPage() {
        if(preg_match("#/realisation/(.*)-([0-9]+).php#i",$this -> url,$matches)) {
            $page = new ControllerRealisation();
            $page -> setIdRealisation($matches[2]);
        } else if(preg_match("#/([a-z0-9_/-]+)(\.php)?#i",$this -> url,$matches)){
            $page = new ControllerSimpleHTML("../templates");
            $page -> setRootDir("../pages");
            $page -> setUrl($matches[1]);
        } else {
            $page = new ControllerSimpleHTML("../templates");
            $page -> setRootDir("../pages");
            $page -> setUrl("");
        }
        $page -> setRequestURL($this -> url);
        return $page;
    }
}