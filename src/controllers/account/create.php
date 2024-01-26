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

    } else {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $name = $_POST["name"];

        $db->signUp($name, $email, $password);
        header("Location: /login");
    }
}

require base_path("src/views/signup.view.php");

?>