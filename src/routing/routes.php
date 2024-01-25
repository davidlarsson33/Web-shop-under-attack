<?php

$controllersDir = "../src/controllers";

$routeHandler -> get('/', "$controllersDir/index.php");
$routeHandler -> get('/about', "$controllersDir/about.php");
$routeHandler -> get('/signup', "$controllersDir/signup.php");
$routeHandler -> get('/login', "$controllersDir/login.php");
$routeHandler -> get('/reviews', "$controllersDir/Reviews.php");
$routeHandler -> get('/pricing', "$controllersDir/pricing.php");
$routeHandler -> get('/account', "$controllersDir/account.php");
$routeHandler -> get('/logout', "$controllersDir/logout.php");
$routeHandler -> get('/notfound', "$controllersDir/404.php");

$routeHandler -> post('/reviews', "$controllersDir/review/create.php");
$routeHandler -> post('/signup', "$controllersDir/account/create.php");
$routeHandler -> post('/login', "$controllersDir/session/login.php");
$routeHandler -> post('/logout', "$controllersDir/session/logout.php");

$routeHandler -> delete('/account', "$controllersDir/account/destroy.php");

?>