<?php

$email = $_POST["email"];
$password = $_POST["password"];

$dbConfig = require_once base_path("src/db/configurations/dbconfig.php");
$db = new LoginDbHandler($dbConfig, 'db-username', 'db-password');
$errors = $db->login($email, $password);

if (empty($errors)) {

    updateSessionVariables(getUserName($db, $email), $email);
    session_regenerate_id(true);

    redirect("/");

} else {

    $showModal = true;
    $header = "Could not sign in";
    $message = $errors;

    require base_path("src/views/login.view.php");

}

function getUserName($db, $email)
{
    
    return $db->getUserName($email);

}

function updateSessionVariables($newName, $newEmail)
{
    Session::put("user", $newName);
    Session::put("email", $newEmail);
}
