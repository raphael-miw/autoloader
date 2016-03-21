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


// utilisation d'un "routage" dans le htaccess ou paramètres GET dans l'url
// récupération du controleur
$controleur = $controller_manager -> getController($_GET["controller"]);

// récupération des paramètres
$parametres = $_GET;
unset($parametres["controller"]);
unset($parametres["action"]);
$controleur -> setParameters($parametres);

// execution de l'action
$controleur -> executeAction($_GET["action"]);