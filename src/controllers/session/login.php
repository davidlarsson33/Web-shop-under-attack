<?php

include_once base_path("src/db/LoginDbHandler.php");
include_once base_path("src/db/DatabaseHandler.php");
$dbConfig = require_once base_path("src/db/configurations/dbconfig.php");

if (isset($_POST["submit"])) {
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

        header('Location: /');

    } else {
        echo "NOT OK";
    }
}
?>