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
use Web\Controllers\Controller;
use Web\View\Data\FrontViewData;

class PostController extends Controller
{

    protected $id_post;

    public function setParameters($params) {
        $this -> id_post = $params["id_post"];
    }

    public function displayDetailAction() {
        //récupération du post
        $post = new PostModel($this -> id_post);

        // préparation des données du template
        $data = [
            "post" => $post
        ];

        $vue = new BlogFrontView("post",$data);
        $vue -> setWrapperData(new FrontViewData($post -> sujet,$post->message));
        echo $vue -> render() ;
    }
}