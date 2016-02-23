<?php

/** @var \Composer\Autoload\ClassLoader $autoloader */
$autoloader = require "../vendor/autoload.php";

// ne peut être utilisé QUE si le classmap a été généré :
// composer  dumpautoload -o
$autoloader -> setClassMapAuthoritative(true);

$a = new \Html\Page\PageArticle();
echo $a;  // __toString()