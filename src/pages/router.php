<?php

$uri = parse_url($_SERVER["REQUEST_URI"]);
$requestedPath = $uri["path"];

$routes = [
    '/' => 'index.php',
    '/about' => 'about.php',
    '/signup' => 'signup.php',
    '/login' => 'login.php',
    '/reviews' => 'Reviews.php',
    '/pricing' => 'pricing.php'
];

if (array_key_exists($requestedPath, $routes)) {
    require $routes[$requestedPath];
} else {
    echo "404, page not found!";
}   

?>