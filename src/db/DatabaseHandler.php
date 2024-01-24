<?php
class DatabaseHandler
{
    private static $instance;
    private $db;

    private function __construct($config, $username, $password)
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->db = $this->connect($dsn, $username, $password);
    }

    static function getInstance($config, $username, $password)
    {
        if (is_null(self::$instance)) {
            self::$instance = new DatabaseHandler($config, $username, $password);
        }

        return self::$instance;
    }

    private function connect($dsn, $username, $password)
    {

        try {
            $pdo = new PDO($dsn, $username, $password);
            return $pdo;

        } catch (PDOException $e) {
            echo "Could not connect to db. Error: $e";
            die();
        }
    }

    function queryInsecure($query)
    {
        $stmt = $this->db->query($query);
        return $stmt;
    }
}
?>