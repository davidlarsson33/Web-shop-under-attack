<?php include "DatabaseHandler.php"; ?>

<?php
class SignUp extends DatabaseHandler
{
    function __construct(){
        parent::__construct();
    }
    //TODO: Close connection to db
    function signUp($name, $email, $password)
    {
        $this->queryInsecure(
            "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')"
        );
    }

    public function userExists($email)
    {
        $stmt = "SELECT EXISTS(SELECT 1 FROM users WHERE email = $email)";
        $result = $this->queryInsecure($stmt);
        return $result;
    }
}
?>