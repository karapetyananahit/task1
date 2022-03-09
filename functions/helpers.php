<?php

function dd(...$dd)
{
    echo "<pre>";
    for ($i = 0; $i < count($dd); $i++) {
        print_r($dd[$i]);
        echo "<br>";
    }
    die;
}

function pr($dd)
{
    echo "<pre>";
    print_r($dd);
    echo "</pre>";
}