<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 20/03/16
 * Time: 21:43
 */

namespace Web\Models;




abstract class Model
{
    public $id;

    public function __construct($id,$autoHydrate = true) {
        $this->id = $id;

        if($autoHydrate) {
            $this -> hydrate($this -> fetchData());
        }
    }

    abstract public function fetchData();

    abstract public function hydrate($data);
}