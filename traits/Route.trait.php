<?php


trait RouteTrait
{
    static public function goTo($url)
    {
        header("location: $url");
    }

    static public function goToLogin()
    {
        self::goTo("/login");
    }

    static public function goToProducts()
    {
        self::goTo("/products");
    }

    static public function goToRegister()
    {
        self::goTo("/register");
    }
}