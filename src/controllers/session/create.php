<?php

$dbConfig = require_once base_path("src/db/configurations/dbconfig.php");


$email = $_POST["email"];
$password = $_POST["password"];
$db = new LoginDbHandler($dbConfig, 'db-username', 'db-password');
$errors = $db->login($email, $password);

if (empty($errors)) {
    $db = DatabaseHandler::getInstance($dbConfig, 'db-username', 'db-password');

    $result = $db->queryInsecure("SELECT name FROM users WHERE email = '$email'");
    $name = $result->fetch(PDO::FETCH_ASSOC)["name"];
    
    $_SESSION["user"] = $name;
    $_SESSION["email"] = $email;
    session_regenerate_id(true);

    header('Location: /');

} else {

    $showModal = true;
    $header = "Could not sign in";
    $message = "Username or password is incorrect";
    
    require base_path("src/views/login.view.php");

}

?>