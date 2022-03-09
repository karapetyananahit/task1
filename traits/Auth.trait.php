<?php


trait AuthTrait
{
    static public function name()
    {
        return $_SESSION["auth"]["name"];
    }

    static public function surname()
    {
        return $_SESSION["auth"]["surname"];
    }

    static public function fullname()//es?
    {
        return self::name() . " " . self::surname();
    }
}