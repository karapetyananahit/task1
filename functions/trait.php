<?php


function addTrait($path)
{
    $folder = "traits/";
    $ext = ".trait.php";
    $fullpath = "$folder$path$ext";

    include $fullpath;
}