<?php
$page_name = $_GET["page"];
$liste_pages = array(
    "contact","index","about"
);
if(!in_array($page_name,$liste_pages)) {
    $page_name = "404";// exit("acces interdit");
}

$title = "accueil";

include '../ressources/header.php';

include "../ressources/body/".$page_name.".php";

include '../ressources/footer.html';
