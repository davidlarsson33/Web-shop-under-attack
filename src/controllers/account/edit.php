<?php

$dbConfig = require_once base_path("src/db/configurations/dbconfig.php");

$showModal = false;
$validator = new FormValidator();
$_POST['terms&conditions'] = "agree";
$errors = $validator->validateFormData($_POST);

if (empty($errors)) {

    $db = new EditDbHandler($dbConfig, 'db-username', 'db-password');

    $oldEmail = $_SESSION['email'];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $name = $_POST["name"];

    $db->update($oldEmail, $name, $email, $password);
    header("Location: /");
    exit();

}

require base_path("src/views/account.view.php");

?>