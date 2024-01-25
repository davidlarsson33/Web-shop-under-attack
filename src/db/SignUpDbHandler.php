<?php require_once base_path("src/db/SingletonDbHandler.php"); ?>
<?php
class SignUpDbHandler extends SingletonDbHandler
{
    function __construct($config, $username, $password)
    {
       parent::__construct($config, $username, $password);
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