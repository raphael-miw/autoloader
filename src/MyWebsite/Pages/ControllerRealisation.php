<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 23/02/16
 * Time: 03:25
 */

namespace MyWebsite\Pages;


use NanoFramework\Html\Page\Controller;

class ControllerRealisation extends FrontController
{
    protected $id_realisation;

    public function setIdRealisation($id_realisation)
    {
        $this -> id_realisation = $id_realisation;
    }

    public function getContenu()
    {
        $data = array(
            "id_realisation" => $this -> id_realisation
        );
        return $this -> template_loader -> render("realisation.tpl.php",$data);
    }

    public function getMetaDesc()
    {
        return "desc Réal ".$this -> id_realisation;
    }

    public function getTitle()
    {
        return "Title réalisation ".$this -> id_realisation;
    }

    public function getUrl()
    {
        return "/realisation/real".$this->id_realisation."-".$this -> id_realisation.".php";
    }

}