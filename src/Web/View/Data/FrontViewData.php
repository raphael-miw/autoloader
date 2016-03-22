<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 22/03/16
 * Time: 21:04
 */

namespace Web\View\Data;

class FrontViewData {
    const INDEX_FOLLOW = "index, follow";
    const NOINDEX_NOFOLLOW = "noindex, nofollow";
    const NOINDEX_FOLLOW = "noindex, follow";

    public $title;
    public $meta_desc;
    public $meta_keywords;
    public $meta_robots;

    /**
     * FrontViewData constructor.
     * @param $title
     * @param $meta_desc
     * @param $meta_keywords
     * @param $meta_robots
     */
    public function __construct($title, $meta_desc='', $meta_keywords='', $meta_robots = self::INDEX_FOLLOW)
    {
        $this->title = substr($title,0,65);
        $this->meta_desc = substr($meta_desc,0,300);
        $this->meta_keywords = $meta_keywords;
        $this->meta_robots = $meta_robots;
    }

}