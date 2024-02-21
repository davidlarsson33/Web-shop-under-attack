<?php
class LoginDbHandler extends SingletonDbHandler
{

    function __construct($config, $username, $password)
    {
        parent::__construct($config, $username, $password);
    }

    function getUserName($email)
    {
        $stmt = "SELECT name FROM users WHERE email = '$email'";
        $result = $this -> db->queryInsecure($stmt);
        
        $name = $result->fetch(PDO::FETCH_ASSOC)["name"];

        return $name;
    }



    function login($email, $password)
    {
        $stmt = "SELECT password FROM users WHERE email = '$email'";
        $result = $this->db->queryInsecure($stmt);
        $error = null;

        if (is_bool($result)) {
            return false;

        } else if (empty($result->rowCount())) {
            $error = "Username: " . htmlspecialchars($email) . " or password is incorrect!";
        } else {
            $storedHash = $result->fetch(PDO::FETCH_ASSOC)["password"];

            if (!password_verify($password, $storedHash)) {
                $error = "Username or password is incorrect!";
            }

        }

        return $error;
    }
}
?>