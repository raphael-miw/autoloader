<?php
/**
 * Created by PhpStorm.
 * User: raph
 * Date: 22/03/16
 * Time: 21:51
 */

namespace Web\Core\Http;

class HttpResponse {
    const REDIRECT_TEMPORAIRE = "302";
    const REDIRECT_PERMANENT = "301";

    public static function redirect($url,$mode = self::REDIRECT_TEMPORAIRE) {
        header("Location: ".$url,TRUE,$mode);
        exit;
    }

    public static function Erreur404() {
        header("HTTP/1.0 404 Not Found");
    }
}