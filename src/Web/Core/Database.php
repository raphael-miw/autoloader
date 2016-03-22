<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 20/03/16
 * Time: 21:17
 */

namespace Web\Core;


class Database
{

    // singleton
    /** @var \mysqli */
    private static $instance = null;


    public static function configure($host, $user, $pass, $database) {
        self::$instance = new \mysqli($host,$user,$pass,$database);
        Database::getInstance() -> query("SET NAMES 'utf8'");
    }

    /**
     * @return \mysqli
     * @throws \Exception
     */
    public static function getInstance() {
        if(!is_null(self::$instance)) {
            return self::$instance;
        }else {
            throw new \Exception("la BDD n'est pas configurée");
        }
    }
}