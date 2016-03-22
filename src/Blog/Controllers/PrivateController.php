<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 22/03/16
 * Time: 21:56
 */

namespace Blog\Controllers;



use Blog\Services\UserService;
use Blog\View\BlogFrontView;
use Web\Controllers\Controller;
use Web\Core\Http\HttpResponse;
use Web\View\Data\FrontViewData;

class PrivateController extends Controller
{
    public function displayAction() {
        if(!UserService::getInstance() -> isConnected()) {
            HttpResponse::redirect("/login");
        }

        $vue = new BlogFrontView("private/index");
        $vue -> setWrapperData(new FrontViewData("Espace privé !"));
        echo $vue -> render();
    }
}