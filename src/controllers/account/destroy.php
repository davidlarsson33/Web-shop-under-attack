<?php

    $dbConfig = require_once base_path("src/db/configurations/dbconfig.php");
    $db = new DeleteDbHandler($dbConfig, "db-username", "db-password");
    $db -> delete(Session::get("email"));

    Session::destroy();

    redirect("/");
?>