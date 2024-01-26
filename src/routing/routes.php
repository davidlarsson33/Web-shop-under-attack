<?php

$controllersDir = "../src/controllers";

$routeHandler -> get('/', "$controllersDir/index.php");
$routeHandler -> get('/about', "$controllersDir/about.php");
$routeHandler -> get('/signup', "$controllersDir/signup.php");
$routeHandler -> get('/login', "$controllersDir/login.php")->restrictTo("guest");
$routeHandler -> get('/reviews', "$controllersDir/reviews.php");
$routeHandler -> get('/pricing', "$controllersDir/pricing.php");
$routeHandler -> get('/account', "$controllersDir/account.php")->restrictTo("authenticated");;
$routeHandler -> get('/logout', "$controllersDir/logout.php")->restrictTo("authenticated");;
$routeHandler -> get('/notfound', "$controllersDir/404.php");

$routeHandler -> post('/reviews', "$controllersDir/review/create.php")->restrictTo("authenticated");;
$routeHandler -> post('/signup', "$controllersDir/account/create.php")->restrictTo("guest");;
$routeHandler -> post('/login', "$controllersDir/session/login.php")->restrictTo("guest");;
$routeHandler -> post('/logout', "$controllersDir/session/logout.php")->restrictTo("guest");;

$routeHandler -> delete('/account', "$controllersDir/account/destroy.php")->restrictTo("authenticated");;

?>