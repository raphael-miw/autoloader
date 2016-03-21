<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 17/03/16
 * Time: 22:17
 */

namespace Blog\Controllers;


use Blog\Models\PostModel;
use Core\Database;
use Web\Controllers\FrontController;

class BlogController extends FrontController
{
    public function listAction() {
        //récupération des posts

        $liste_id_posts = Database::getInstance() -> query('SELECT id_post FROM post');
        $posts = [];
        foreach($liste_id_posts -> fetch_all(MYSQLI_ASSOC) AS $un_post) {
            $posts[] = new PostModel($un_post["id_post"]);
        }
        // préparatino des données du template
        $data = [
            "posts" => $posts
        ];
        
        echo $this -> renderPage("blog",$data);
    }

    protected function getTitle()
    {
        return "Le Blog !";
    }
}