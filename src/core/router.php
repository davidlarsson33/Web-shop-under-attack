<?php require base_path("src/core/RouteHandler.php")?>
<?php

$uri = parse_url($_SERVER["REQUEST_URI"]);
$requestedPath = $uri["path"];
$method = $_POST['_method'] ?? $_SERVER["REQUEST_METHOD"];

$routeHandler = new RouteHandler();
$routes = require "routes.php";

$routeHandler -> route($requestedPath, $method);

?>