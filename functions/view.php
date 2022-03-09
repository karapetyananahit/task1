<?php


function view($pageView, ...$variables)
{
    foreach ($variables as $v) {
        extract($v);
    }


    $pageView = implode("/", explode(".", $pageView));
    $ext = ".php";

    include "$pageView$ext";
}

