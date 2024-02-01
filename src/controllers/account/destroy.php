<?php

    $dbConfig = require_once base_path("src/db/configurations/dbconfig.php");
    $db = new DeleteDbHandler($dbConfig, "db-username", "db-password");
    $db -> delete($_SESSION["email"]);
    
    session_unset();
    session_destroy();
    header("Location: /");
?>