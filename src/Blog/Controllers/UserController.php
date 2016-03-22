<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 22/03/16
 * Time: 20:02
 */

namespace Blog\Controllers;


use Blog\Services\UserService;
use Blog\View\BlogFrontView;
use Web\Controllers\Controller;
use Web\Core\Http\HttpResponse;
use Web\View\Data\FrontViewData;

class UserController extends Controller
{
    public function displayLoginAction() {
//        TODO : gérer le cas ou on est deja connecté
        if(UserService::getInstance() -> isConnected()) {
            HttpResponse::redirect("/private");
        }
        $view = new BlogFrontView("login");
        $view -> setWrapperData(new FrontViewData("Identification","","",FrontViewData::NOINDEX_NOFOLLOW));
        echo $view -> render();
    }

    public function logoutAction() {
        //TODO : déplacer dans UserService
        unset($_SESSION["userData"]);
        HttpResponse::redirect("/");
    }
    public function connectAction() {

        if(isset($_POST["email"]) && isset($_POST["password"])) {
            //TODO : vérifier le format du post (email / pass)
            //TODO : vérifier les informations en BDD

            // on stocke les informations (si valides)
            //TODO : déplacer dans UserService
            $_SESSION["userData"] = array(
                "email" => $_POST["email"]
            );

            HttpResponse::redirect("/private");
        } else {
            HttpResponse::redirect("/login");
        }
    }
}