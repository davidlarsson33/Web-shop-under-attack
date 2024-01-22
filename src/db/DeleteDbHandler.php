<?php include "DatabaseHandler.php"; ?>
<?php
class DeleteDbHandler
{
    private $db;
    function __construct($config, $username, $password)
    {
        $this->db = DatabaseHandler::getInstance($config, $username, $password);
    }

    function delete($email)
    {
        $stmt = "DELETE FROM users WHERE email = '$email'";
        $this->db->queryInsecure($stmt);
    }
}
?>