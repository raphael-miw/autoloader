<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 17/03/16
 * Time: 22:17
 */

namespace Web\Controllers;


use Web\Blog\Models\Post;

class BlogController extends FrontController
{
    public function listAction() {
        //récupération des posts
        $posts = [
                new Post(1),
                new Post(56),
                new Post(9),
                new Post(2),
                new Post(11)
            ];

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