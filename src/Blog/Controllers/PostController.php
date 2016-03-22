<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 17/03/16
 * Time: 22:17
 */

namespace Blog\Controllers;


use Blog\Models\PostModel;
use Blog\View\BlogFrontView;
use Web\Controllers\FrontController;

class PostController extends FrontController
{

    protected $id_post;

    public function setParameters($params) {
        $this -> id_post = $params["id_post"];
    }

    public function detailAction() {
        //récupération du post
        $post = new PostModel($this -> id_post);

        // préparation des données du template
        $data = [
            "post" => $post
        ];
        
        $view = new BlogFrontView("post",$data);
        echo $view -> render() ;
    }

    protected function getTitle()
    {
        return "Le Blog !";
    }
}