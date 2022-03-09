<?php


spl_autoload_register("_autoload");

function _autoload($className)
{
    $folder = "classes/";
    $ext = ".class.php";
    $fullpath = "$folder$className$ext";

    if (!file_exists($fullpath)) {
        $folder = "models/";
        $ext = ".model.php";
        $fullpath = "$folder$className$ext";
    }

    include $fullpath;

}

