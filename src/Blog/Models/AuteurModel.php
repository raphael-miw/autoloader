<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 20/03/16
 * Time: 22:06
 */

namespace Blog\Models;

use Web\Models\DatabaseModel;

class AuteurModel extends DatabaseModel
{

    protected $table_name = "auteur";

    protected $primary_key_name = "id_auteur";

    // propriétés qui seront remplies directement depuis la BDD
    public $nom;
    public $prenom;

    public function getDisplayName()
    {
        return ucfirst(strtolower($this -> prenom)).' '.strtoupper(substr($this -> nom ,0,1)).".";
    }
}