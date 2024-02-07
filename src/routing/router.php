<?php
require base_path("src/routing/RouteHandler.php");

Session::start();

$request = parseIncommingRequest();

$routeHandler = new RouteHandler();
require "routes.php";
$routeHandler->route($request["path"], $request["http_method"]);

function parseIncommingRequest()
{
    return [
        "path" => parse_url($_SERVER["REQUEST_URI"])["path"],
        "http_method" => $_POST['_method'] ?? $_SERVER["REQUEST_METHOD"]
    ];

}