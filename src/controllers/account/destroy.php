<?php

    deleteAccount(Session::get("email"));

    Session::destroy();

    redirect("/");

    function deleteAccount($email){

        $dbConfig = require_once base_path("src/db/configurations/dbconfig.php");
        
        $db = new DeleteDbHandler($dbConfig, "db-username", "db-password");
        $db -> delete($email);

    }
