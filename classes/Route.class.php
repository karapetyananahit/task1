<?php

include "traits/Route.trait.php";
include "middlewares/auth.middleware.php";

class Route
{

    use RouteTrait;

    static $middlewares = [
        "auth" => "AuthMiddleware",
    ];

    static $hasUrl = false;
    static $urlWeb = "";


    static public function get($url, $action, $middleware = "")
    {
        if (!self::$hasUrl) {
            self::checkUrl($url, $action, "GET", $middleware);
        }
    }

    static public function post($url, $action, $middleware = "")
    {
        if (!self::$hasUrl) {
            self::checkUrl($url, $action, "POST", $middleware);
        }
    }

    static public function getUrlWeb()
    {
        if (!self::$urlWeb) {
            self::$urlWeb = $_SERVER["REQUEST_URI"];
            $isset = strpos(self::$urlWeb, "?");

            if ($isset) {
                self::$urlWeb = substr(self::$urlWeb, 0, $isset);
            }

            self::$urlWeb = substr(self::$urlWeb, 1);
        }
    }

    static public function checkUrl($url, $action, $method, $middleware)
    {

        self::getUrlWeb();

        if (self::$urlWeb == $url && $method == $_SERVER["REQUEST_METHOD"]) {

            if ($middleware !== "") {
                $call = self::$middlewares[$middleware];
                $call::run();
            }

            self::$hasUrl = true;
            $action = explode("@", $action);
            $class = $action[0];
            $action = $action[1];

            $obj = new $class();
            $obj->$action();
        }

    }


}
