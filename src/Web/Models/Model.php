<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 20/03/16
 * Time: 21:43
 */

namespace Web\Models;


use Core\Database;

abstract class Model
{
    public $id;

    /**
     * @var \mysqli
     */
    protected $database;

    public function __construct($id) {
        $this -> id = $id;
        $this -> database = Database::getInstance();
        $this -> hydrate();
    }

    abstract public function hydrate();
}