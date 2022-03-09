<?php


function addInterface($path)
{
    include "interfaces/$path.php";

    $folder = "interfaces/";
    $ext = ".interface.php";
    $fullpath = "$folder$path$ext";

    include $fullpath;
}

