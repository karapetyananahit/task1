<?php


class AuthMiddleware
{
    static public function run()
    {
        if (!isset($_SESSION['auth'])) {
            Route::goToLogin();
        }
    }
}