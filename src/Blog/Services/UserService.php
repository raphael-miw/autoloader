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
        //TODO : peut-être pas suffisant
        return isset($_SESSION["userData"]);
    }

    public function getDataUser() {
        return $_SESSION["userData"];
    }

    public function getEmail() {
        return $_SESSION["userData"]["email"];
    }

    public function logout()
    {
        unset($_SESSION["userData"]);
    }

    public function login($email, $password)
    {
        //TODO : rajouter les contrôles
        $_SESSION["userData"] = array(
            "email" => $email
        );
    }
}
