<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 20/03/16
 * Time: 22:04
 */

namespace Blog\Models;


use Web\Models\DatabaseModel;

class PostModel extends DatabaseModel
{

    protected $table_name = "post";

    protected $primary_key_name = "id_post";

    // propriétés qui seront remplies directement depuis la BDD
    public $sujet;
    public $message;
    public $date_post;
    public $id_auteur;

    /**
     * @var AuteurModel
     */
    public $auteur = null;

    public function hydrate($fetch)
    {
        parent::hydrate($fetch);
//        $this -> sujet = $fetch -> sujet;
//        $this -> message = $fetch -> message;
//        $this -> date_post = $fetch -> date_post;
        
        $this -> auteur = new AuteurModel($fetch -> id_auteur);
    }
}