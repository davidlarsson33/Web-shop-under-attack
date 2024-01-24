<?php require_once base_path("src/db/SingletonDbHandler.php"); ?>
<?php
class DeleteDbHandler extends SingletonDbHandler
{
    function __construct($config, $username, $password)
    {
        parent::__construct($config, $username, $password);
    }

    function delete($email)
    {
        $stmt = "DELETE FROM users WHERE email = '$email'";
        $this->db->queryInsecure($stmt);
    }
}
?>