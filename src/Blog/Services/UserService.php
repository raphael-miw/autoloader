<?php

namespace Blog\Services;

class UserService {


    /*
     * singleton, afin que tout le monde accède au même service
     * todo : remplacer par de l'injection de dépendance
     */
    /** @var null UserService */
    private static $instance = null;

    /**
     * @return UserService
     */
    public static function getInstance() {
        if(is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /*
     *
     * méthodes du service
     *
     */

    public function isConnected()
    {
        return isset($_SESSION["userData"]);
    }
}
