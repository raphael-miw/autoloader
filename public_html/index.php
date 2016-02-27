<?php

/** @var \Composer\Autoload\ClassLoader $autoloader */
$autoloader = require "../vendor/autoload.php";

// ne peut être utilisé QUE si le classmap a été généré :
// composer  dumpautoload -o
//$autoloader -> setClassMapAuthoritative(true);

/** @var \NanoFramework\Html\SimpleRouteur $routeur */
$routeur = new \MyWebsite\MyRouteur();
$routeur -> initCurrentURL();
$page = $routeur -> getPage();

$page -> initialize();
echo $page -> render();
