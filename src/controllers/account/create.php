<?php

$dbConfig = require_once base_path("src/db/configurations/dbconfig.php");
$db = new SignUpDbHandler($dbConfig, 'db-username', 'db-password');

$errors = (new FormValidator())->validateFormData($_POST);

if (empty($errors)) {

    if (userExists($db)) {
        $showModal = true;
        $header = "Could not sign up";
        $message = "Error: Username exists";

    } else {
        signUpUser($db, $_POST["name"], $_POST["email"], $_POST["password"]);
        redirect("/login");
    }

} else {
    $showModal = true;
    $header = "Could not sign up";
    $message = implode("<br>", $errors);
}

require base_path("src/views/signup.view.php");


function userExists($db)
{
    return $db->userExists($_POST["email"]);
}

function signUpUser($db, $newName, $newEmail, $newPassword)
{
    $db->signUp($newName, $newEmail, $newPassword);
}



?>