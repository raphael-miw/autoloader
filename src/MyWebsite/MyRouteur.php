<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 25/02/16
 * Time: 22:27
 */

namespace MyWebsite;


use NanoFramework\Html\Page\Page;
use MyWebsite\Pages\PageRealisation;
use MyWebsite\Pages\PageSimpleHTML;
use NanoFramework\Html\SimpleRouteur;

class MyRouteur extends SimpleRouteur
{
    /**
     * @return Page
     */
    public function getPage() {
        if(preg_match("#/realisation/(.*)-([0-9]+).php#i",$this -> url,$matches)) {
            $page = new PageRealisation();
            $page -> setIdRealisation($matches[2]);
        } else if(preg_match("#/([a-z0-9_/-]+)(\.php)?#i",$this -> url,$matches)){
            $page = new PageSimpleHTML();
            $page -> setRootDir("../pages");
            $page -> setUrl($matches[1]);
        } else {
            $page = new PageSimpleHTML();
            $page -> setRootDir("../pages");
            $page -> setUrl("");
        }
        $page -> setRequestURL($this -> url);
        return $page;
    }
}