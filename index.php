<?php

include_once "Autoloader.php";
$autoloader = new Autoloader();
spl_autoload_register(array($autoloader,"loadClass"));

$a = new \Html\Page\PageArticle();
echo $a;  // __toString()