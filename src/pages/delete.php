<?php
    include_once "../db/DeleteDbHandler.php";

    session_start();

    $db = new DeleteDbHandler();
    $db -> delete($_SESSION["email"]);

    session_unset();
    session_destroy();
    header("Location: /")
?>