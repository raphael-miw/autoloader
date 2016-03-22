<?php

namespace Blog\View;


use Web\View\FrontView;

class BlogFrontView extends FrontView {

    public function __construct($template, array $data)
    {
        $this -> setWrapper("root_model");
        parent::__construct($template, $data);
    }
}