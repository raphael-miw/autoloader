<?php
require "../vendor/autoload.php";

Core\Database::configure("localhost","root","root","blog");

// configuration du chemin de nos controleurs
$controller_manager = new \Web\Controllers\ControllerManager("\\Blog\\Controllers\\");

// configuration du chemin par défaut aux vues
\Web\Controllers\Controller::$default_views_path = __DIR__."/../views/";

// exemple d'utilisation
$controller = $controller_manager -> getController("homepage");
//$controller -> setParameter("page","index");
//$controller -> setParameters(array("page" => "index"));
$controller -> executeAction("display");
