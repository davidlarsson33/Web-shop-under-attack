<?php
require base_path("src/routing/RouteHandler.php");
include base_path("src/utilities/Session.php");

Session::start();

$requestedPath = parse_url($_SERVER["REQUEST_URI"])["path"];
$HTTPmethod = $_POST['_method'] ?? $_SERVER["REQUEST_METHOD"];

$routeHandler = new RouteHandler();
$routes = require "routes.php";

$routeHandler -> route($requestedPath, $HTTPmethod);

