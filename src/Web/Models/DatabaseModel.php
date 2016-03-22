<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 22/03/16
 * Time: 18:48
 */

namespace Web\Models;


use Web\Core\Database;

abstract class DatabaseModel extends Model
{
    
    protected $table_name = null;
    
    protected $primary_key_name = null;
    
    /**
     * @var \mysqli
     */
    protected $database;
    
    public function __construct($id = null,$autoHydrate = true)
    {

        // contrôles
        if(is_null($this->table_name)) {
            throw new \Exception("La table n'a pas été définie");
        }
        if(is_null($this->primary_key_name)) {
            throw new \Exception("La primary key n'a pas été définie");
        }

        //TODO : injection de dépendance ?
        $this -> database = Database::getInstance();

        parent::__construct($id,false);

        if(!is_null($id) && $autoHydrate) {
            $this -> hydrate($this -> fetchData());
        }

    }

    /**
     * @return object|\stdClass
     */
    public function fetchData() {
        // ex : SELECT * FROM auteur WHERE id_auteur = ".(int)$this -> id
        $fetch = $this -> database
            -> query("SELECT * FROM ".$this->table_name." WHERE ".$this->primary_key_name." = ".(int)$this -> id)
            -> fetch_object();

        return $fetch;
    }

    /**
     * @param object|\stdClass $fetch
     * remplissage automatique des propriétés publiques contenues dans le fetch de la BDD
     * ex :
     * $this -> nom = $fetch -> nom;
     * $this -> prenom = $fetch -> prenom
     */
    public function hydrate($fetch)
    {
        // reflectionClass permet de parcourir les propriétés de notre Model
        $reflectionClass = new \ReflectionClass($this);

        // liste des propriétés
        $props   = $reflectionClass->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED);

        foreach ($props as $prop) {
            $prop_name = $prop->getName();

            // on vérifie que le fetch contient cette propriété
            if(property_exists($fetch,$prop_name)) {
                // ex : $this -> nom = $fetch -> nom
                $this -> {$prop_name} = $fetch -> {$prop_name};
            }
        }

    }

}