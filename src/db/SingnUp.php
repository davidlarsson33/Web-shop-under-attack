<?php include "database/DatabaseHandler.php"; ?>
<?php include "database/DatabaseHandler.php"; ?>

<?php
class SignUp extends DatabaseHandler
{
    //TODO: Close connection to db
    function signUp($email, $password, $name)
    {
        $this->queryInsecure(
            "INSERT INTO users (email, password) VALUES ($email, $password)"
        );
    }

    public function userExists($email)
    {
        $stmt = "SELECT EXISTS(SELECT 1 FROM users WHERE email = $email)";
        $result = $this->queryInsecure($stmt);
        return $result->fetchColumn();
    }

}
?>