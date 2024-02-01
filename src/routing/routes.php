<?php

$routeHandler -> get('/', "index.php");
$routeHandler -> get('/about', "about.php");
$routeHandler -> get('/signup', "signup.php");
$routeHandler -> get('/login', "login.php")->restrictTo("guest");
$routeHandler -> get('/reviews', "reviews.php");
$routeHandler -> get('/pricing', "pricing.php");
$routeHandler -> get('/account', "account.php")->restrictTo("authenticated");;
$routeHandler -> get('/logout', "logout.php")->restrictTo("authenticated");;
$routeHandler -> get('/notfound', "404.php");

$routeHandler -> post('/reviews', "review/create.php")->restrictTo("authenticated");;
$routeHandler -> post('/signup', "account/create.php")->restrictTo("guest");;
$routeHandler -> post('/session', "session/create.php")->restrictTo("guest");;

$routeHandler -> delete('/session', "session/destroy.php")->restrictTo("authenticated");
$routeHandler -> delete('/account', "account/destroy.php")->restrictTo("authenticated");

$routeHandler -> patch('/account', "account/edit.php")->restrictTo("authenticated");

?>