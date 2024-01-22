<?php include "DatabaseHandler.php"; ?>
<?php
class SignUpDbHandler
{
    private $db;
    function __construct($config, $username, $password ){
        $this -> db = DatabaseHandler::getInstance($config, $username, $password );
    }

    //TODO: Close connection to db
    function signUp($name, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this -> db -> queryInsecure(
            "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')"
        );

    }

    public function userExists($email)
    {
        $stmt = "SELECT EXISTS(SELECT 1 FROM users WHERE email = $email)";
        $result = $this -> db -> queryInsecure($stmt);
        return $result;
    }
}
?>