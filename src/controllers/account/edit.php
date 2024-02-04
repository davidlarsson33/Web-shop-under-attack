<?php

$dbConfig = require_once base_path("src/db/configurations/dbconfig.php");

$showModal = false;
$validator = new EditFormValidator();
$errors = $validator->validateFormData($_POST);

if (empty($errors)) {

    $db = new EditDbHandler($dbConfig, 'db-username', 'db-password');

    $newEmail = $_POST["email"];
    $newPassword = $_POST["password"];
    $newName = $_POST["name"];
    $oldEmail = Session::get('email');
    
    Session::put("user", $newName);
    Session::put("email", $newEmail);

    $db->update(
        oldEmail: $oldEmail,
        newName: $newName,
        newEmail: $newEmail,
        newPassword: $newPassword
    );

} else {
    $showModal = true;
    $header = "Could not update credentials";
    $message = "Could not update due to the fact that:" . "<p>".implode("\n",$errors)."</p>";
}

require base_path("src/views/account.view.php");




