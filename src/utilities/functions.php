<?php

function base_path($path)
{
    global $BASE_PATH;
    return $BASE_PATH . $path;
}

function dump($value){
    echo '<pre>' , var_dump($value) , '</pre>';
    die();
}

function redirect($path){
    header("Location: $path");
    exit();
}

?>