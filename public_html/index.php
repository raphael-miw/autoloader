<?php
require "../vendor/autoload.php";

Core\Database::configure("localhost","root","root","blog");

// configuration du chemin de nos controleurs
$controller_manager = new \Web\Controllers\ControllerManager("\\Blog\\Controllers\\");

// configuration du chemin par défaut aux vues
\Web\Controllers\Controller::$default_views_path = __DIR__."/../views/";

// exemple d'utilisation
//$controller = $controller_manager -> getController("simplepage");
//$controller -> setParameter("page","index");
//$controller -> setParameters(array("page" => "index"));
//$controller -> executeAction("display");



// utilisation d'un routeur
$routeur = new \Blog\Routing\BlogRouter();

//affectation du ControllerManaget afin que le routeur sache quelle classe instancier
$routeur -> setControllerManager($controller_manager);

$routeur -> dispatch($_SERVER["REQUEST_URI"]);

