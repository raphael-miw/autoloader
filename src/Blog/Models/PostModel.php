<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 20/03/16
 * Time: 22:04
 */

namespace Blog\Models;


use Web\Models\Model;

class PostModel extends Model
{
    /**
     * @var AuteurModel
     */
    public $auteur = null;

    public $sujet;
    public $message;
    public $date_post;

    public function hydrate()
    {
        $query = $this -> database
            -> query("SELECT * FROM post WHERE id_post = ".(int)$this -> id);

        if($query){
            $fetch = $query -> fetch_object();
            $this -> sujet = $fetch -> sujet;
            $this -> message = $fetch -> message;
            $this -> date_post = $fetch -> date_post;

            $this -> auteur = new AuteurModel($fetch -> id_auteur);
        }

    }
}