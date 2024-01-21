<?php include "DatabaseHandler.php"; ?>
<?php
class DeleteDbHandler extends DatabaseHandler
{

    function delete($email)
    {
        $stmt = "DELETE FROM users WHERE email = '$email'";
        $this->queryInsecure($stmt);
    }
}
?>