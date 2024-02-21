<?php

$dbConfig = require_once base_path("src/db/configurations/dbconfig.php");
$db = new EditDbHandler($dbConfig, 'db-username', 'db-password');

$errors = evalutatePostData($_POST);
changesApproved($db, $errors);

if (empty($errors)) {
    updateCredentials($db, $_POST["name"], $_POST["email"], $_POST["password"]);
    updateSessionVariables($_POST);
} else {
    $showModal = true;
    $header = "Could not update credentials";
    $message = "Could not update due to the fact that:" . "<p>" . implode("<br>", $errors) . "</p>";
}

require base_path("src/views/account.view.php");

function changesApproved($db, &$errors)
{
    if (!($_SESSION["email"] === $_POST["email"] || $db->validChangeOfEmail($_POST["email"]))) {
        $errors["email"] = "Email is already in use";
    }
}


function evalutatePostData($postData)
{
    $validator = new EditFormValidator();
    $errors = $validator->validateFormData($postData);
    return $errors;
}


function updateCredentials($db, $newName, $newEmail, $newPassword)
{

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
    Session::put("user", htmlspecialchars($postData["name"]));
    Session::put("email", htmlspecialchars($postData["email"]));
}




