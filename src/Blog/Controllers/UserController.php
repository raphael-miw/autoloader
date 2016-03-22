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
    /**
     * @var UserService
     */
    protected $service_user;

    public function __construct()
    {
        $this -> service_user = UserService::getInstance();
    }

    public function displayLoginAction() {
        
        if($this -> service_user -> isConnected()) {
            HttpResponse::redirect("/private");
        }
        
        $view = new BlogFrontView("login");
        $view -> setWrapperData(new FrontViewData("Identification","","",FrontViewData::NOINDEX_NOFOLLOW));
        echo $view -> render();
    }

    public function logoutAction() {
        $this -> service_user -> logout();
        HttpResponse::redirect("/");
    }
    public function connectAction() {

        if(isset($_POST["email"]) && isset($_POST["password"])) {
            //TODO : vérifier le format du post (email / pass)
            //TODO : vérifier les informations en BDD

            // on stocke les informations (si valides)
            $this -> service_user -> login($_POST["email"],$_POST["password"]);

            if($this -> service_user -> isConnected()) {
                HttpResponse::redirect("/private");
            }

        }
        HttpResponse::redirect("/login");

    }
}