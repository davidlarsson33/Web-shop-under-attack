<?php


$errors = evalutatePostData($_POST);

if (empty($errors)) {
    updateCredentials($_POST["name"], $_POST["email"], $_POST["password"]);
    updateSessionVariables($_POST);
} else {
    $showModal = true;
    $header = "Could not update credentials";
    $message = "Could not update due to the fact that:" . "<p>" . implode("\n", $errors) . "</p>";
}

function evalutatePostData($postData)
{
    $validator = new EditFormValidator();
    $errors = $validator->validateFormData($postData);
    return $errors;
}

function updateCredentials($newName, $newEmail, $newPassword)
{
    $dbConfig = require_once base_path("src/db/configurations/dbconfig.php");

    $db = new EditDbHandler($dbConfig, 'db-username', 'db-password');

    $oldEmail = Session::get('email');

    $db->update(
        oldEmail: $oldEmail,
        newName: $newName,
        newEmail: $newEmail,
        newPassword: $newPassword
    );
}

function updateSessionVariables($postData)
{
    Session::put("user", $postData["name"]);
    Session::put("email", $postData["email"]);
}


require base_path("src/views/account.view.php");




