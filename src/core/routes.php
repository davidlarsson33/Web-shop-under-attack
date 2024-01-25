<?php

$pagesDir = "../src/pages";

$routeHandler -> get('/', "$pagesDir/index.php");
$routeHandler -> get('/about', "$pagesDir/about.php");
$routeHandler -> get('/signup', "$pagesDir/signup.php");
$routeHandler -> get('/login', "$pagesDir/login.php");
$routeHandler -> get('/reviews', "$pagesDir/Reviews.php");
$routeHandler -> get('/pricing', "$pagesDir/pricing.php");
$routeHandler -> get('/account', "$pagesDir/account.php");
$routeHandler -> get('/logout', "$pagesDir/logout.php");

$routeHandler -> get('/notfound', "$pagesDir/404.php");

// $router -> delete('/account', "$pagesDir.acco.php");

?>