<?php
use Web\Controllers\ControllerManager;
use Web\Core\Database;
use Web\Routing\Route;
use Web\Routing\Router;
use Web\View\SimpleView;

require "../vendor/autoload.php";

Database::configure("localhost","root","root","blog");

// configuration du chemin de nos controleurs
$controller_manager = new ControllerManager("\\Blog\\Controllers\\");

// configuration du chemin par défaut aux vues
SimpleView::$default_views_path = __DIR__."/../views/";

// utilisation d'un routeur
$routeur = new Router();

$routeur -> addRoute(new Route("^/(contact|about)$","simplepage","display",array("page" => "$1")));
$routeur -> addRoute(new Route("^/le-blog$","blog","list"));
$routeur -> addRoute(new Route("^/post/([0-9]+)$","post","detail",array("id_post" => "$1")));
$routeur -> addRoute(new Route("^/$","simplepage","display",array("page" => "index")));
$routeur -> addRoute(new Route("(.*)","simplepage","display",array("page" => "404")));

//affectation du ControllerManager afin que le routeur sache quelle classe instancier
$routeur -> setControllerManager($controller_manager);

$routeur -> dispatch($_SERVER["REQUEST_URI"]);

