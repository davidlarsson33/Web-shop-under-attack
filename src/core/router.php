<?php

$uri = parse_url($_SERVER["REQUEST_URI"]);
$requestedPath = $uri["path"];

$routes = require "routes.php";

if (array_key_exists($requestedPath, $routes)) {
    require $routes[$requestedPath];
} else {
    echo "404, page not found!";
}   

?>