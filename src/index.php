<?php
class DatabaseHandler {

    private $db;

    function __construct() {
        require "dbconfig.php";
        $this->db =  $this->connect($host, $db, $user, $password);
    }

    private function connect($host, $db, $user, $password){

        $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

        try {
            $pdo = new PDO($dsn, $user, $password);
            return $pdo;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    // Insecure. Does not prevent SQL-injection
    function queryInsecure($query){
        $stmt = $this -> db -> query($query);
        return $stmt;
    }
}

$db = new DatabaseHandler();
$stmt = "SELECT * FROM pizzas;"; 
$result = $db -> queryInsecure($stmt);
$result->execute();

$re =  $result->fetchAll();

foreach ($re as $row) {
    echo "Pizza: " . $row['Kebab'] . " " . $row['Ham'] .  "<br>";
}

?>