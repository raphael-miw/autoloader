<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 20/03/16
 * Time: 22:06
 */

namespace Blog\Models;

use Web\Models\Model;

class AuteurModel extends Model
{

    public $nom;
    public $prenom;

    public function hydrate()
    {
        $fetch = $this -> database
            -> query("SELECT * FROM auteur WHERE id_auteur = ".(int)$this -> id)
            -> fetch_assoc();

        $this -> nom = $fetch["nom"];
        $this -> prenom = $fetch["prenom"];    }

    public function getDisplayName()
    {
        return ucfirst(strtolower($this -> prenom)).' '.strtoupper(substr($this -> nom ,0,1)).".";
    }
}