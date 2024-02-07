<?php

$dbConfig = require_once base_path("src/db/configurations/dbconfig.php");


$newEmail = $_POST["email"];
$newPassword = $_POST["password"];
$db = new LoginDbHandler($dbConfig, 'db-username', 'db-password');
$errors = $db->login($newEmail, $newPassword);

if (empty($errors)) {
    $db = DatabaseHandler::getInstance($dbConfig, 'db-username', 'db-password');

    $result = $db->queryInsecure("SELECT name FROM users WHERE email = '$newEmail'");
    $newName = $result->fetch(PDO::FETCH_ASSOC)["name"];
    
    Session::put("user", $newName);
    Session::put("email", $newEmail);

    session_regenerate_id(true);

    redirect("/");

} else {

    $showModal = true;
    $header = "Could not sign in";
    $message = $errors;
    
    require base_path("src/views/login.view.php");

}

?>