<?php
$page_name = $_GET["page"];
$liste_pages = include "../config/detail_pages.php";

// contrôle que la page existe bien
if(!isset($liste_pages[$page_name])) {
    $page_name = "404";// exit("acces interdit");
    header("HTTP/1.0 404 Not Found");
}

$detail_page = $liste_pages[$page_name];

$title = $detail_page["title"];

include '../ressources/header.php';

include "../ressources/body/".$page_name.".php";

include '../ressources/footer.html';
