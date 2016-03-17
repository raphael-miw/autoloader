<?php
require "../vendor/autoload.php";


// simplepage => simplepageController
$controller_name = "Web\\Controllers\\".ucfirst($_GET["controller"]."Controller");

if(class_exists($controller_name)) {
    $controller = new $controller_name();

    $actionName = $_GET["action"]."Action";
//    $controller->displayAction();
    $controller->$actionName();
    
} else {
    throw new Exception("Le controlleur $controller_name n'existe pas");
}

