<?php
require "DatabaseHandler.php";
abstract class SingletonDbHandler
{
    protected $db;
    function __construct($config, $username, $password)
    {
        $this->db = DatabaseHandler::getInstance($config, $username, $password);
    }
}

?>