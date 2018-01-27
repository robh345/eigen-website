<?php
/**
 * Created by PhpStorm.
 * User: Rob Holterman
 * Date: 26-1-2018
 * Time: 14:12
 */

function custom_echo($x, $length)
{
    if (strlen($x) <= $length) {
        return $x;
    } else {
        $y = substr($x, 0, $length) . '...';
        return $y;
    }
}

function redirect($url)
{
    header("Location: $url");
}
