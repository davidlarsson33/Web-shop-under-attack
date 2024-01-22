<?php
class DatabaseHandler
{
    private $db;

    function __construct($config, $username, $password )
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        // $user = 'db-username';
        // $password = 'db-password';

        $this->db = $this->connect($dsn, $username, $password);
    }


    private function connect($dsn, $user, $password)
    {

        try {
            $pdo = new PDO($dsn, $user, $password);
            return $pdo;

        } catch (PDOException $e) {
            return null;
        }
    }

    function queryInsecure($query)
    {
        $stmt = $this->db->query($query);
        return $stmt;
    }
}
?>