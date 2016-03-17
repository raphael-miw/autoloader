<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 17/03/16
 * Time: 22:17
 */

namespace Web\Controllers;


use Web\Blog\Models\Post;

class PostController extends FrontController
{

    public function detailAction() {
        //récupération du post
        $post = new Post($_GET["id_post"]);

        // préparatino des données du template
        $data = [
            "post" => $post
        ];
        
        echo $this -> renderPage("post",$data);
    }

    protected function getTitle()
    {
        return "Le Blog !";
    }
}