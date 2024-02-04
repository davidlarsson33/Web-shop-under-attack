<?php 

$dbConfig = require_once base_path("src/db/configurations/dbconfig.php");

$showModal = false;
$validator = new FormValidator();
$errors = $validator->validateFormData($_POST);

if (empty($errors)) {
    $db = new SignUpDbHandler($dbConfig, 'db-username', 'db-password');
    $userExists = $db->userExists($_POST["email"]);
    
    if ($userExists) {
        $showModal = true;
        $header = "Could not sign up";
        $message = "Error: Username  exists";

    } else {
        $newEmail = $_POST["email"];
        $newPassword = $_POST["password"];
        $newName = $_POST["name"];

        $db->signUp($newName, $newEmail, $newPassword);
        redirect("/login");
    }
}

require base_path("src/views/signup.view.php");

?>