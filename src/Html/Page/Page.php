<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 23/02/16
 * Time: 03:25
 */

namespace Html\Page;


class Page
{
    public function __toString()
    {
        return "page de type ".get_class($this);
    }
}