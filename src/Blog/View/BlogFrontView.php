<?php

namespace Blog\View;


use Blog\Services\UserService;
use Web\View\FrontView;

class BlogFrontView extends FrontView {

    public function __construct($template, array $data = array())
    {
        $this -> setWrapper("root_model");
        parent::__construct($template, $data);
        
        // assignation des variables globales utilisées dans le wrapper
        $this -> wrapper_view -> assign("service_user",UserService::getInstance());
    }
}