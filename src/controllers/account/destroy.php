<?php

if(isset($_POST["token"]) && validToken($_POST["token"])){
    deleteAccount(Session::get("email"));
    Session::destroy();    
}

redirect("/");

function validToken($token)
{
    return $token === $_SESSION["token"];
}

function deleteAccount($email)
{

    $dbConfig = require_once base_path("src/db/configurations/dbconfig.php");

    $db = new DeleteDbHandler($dbConfig, "db-username", "db-password");
    $db->delete($email);

}
