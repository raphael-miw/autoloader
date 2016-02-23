<?php

include_once __DIR__."../Autoloader.php";
$autoloader = new Autoloader();
spl_autoload_register(array($autoloader,"loadClass"));

$a = new \Html\Page\PageArticle();
echo $a;  // __toString()