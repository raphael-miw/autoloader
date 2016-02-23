<?php

/**
 * Created by PhpStorm.
 * User: raph
 * Date: 23/02/16
 * Time: 03:22
 */
class Autoloader
{

    /**
     * Autoloader constructor.
     */
    public function __construct()
    {
    }

    public function loadClass($className) {
        // ex : Html\Page\PageArticle
        $path = explode('\\',$className);

        $classFileName = __DIR__."/src/".implode("/",$path).".php";
        // ex : "src/Html/Page/PageArticle.php
        if(file_exists($classFileName)) {
            require_once $classFileName;
        }
    }
}