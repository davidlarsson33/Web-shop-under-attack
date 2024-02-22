<?php
class SignUpDbHandler extends SingletonDbHandler
{
    function __construct($config, $username, $password)
    {
        parent::__construct($config, $username, $password);
    }

    function signUp($name, $email, $password)
    {
        $stmt = "INSERT INTO users (name, email, password) VALUES (?,?,?)";
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->db->query($stmt, $name, $email, $hashedPassword);
    }

    public function userExists($email)
    {
        $stmt = "SELECT EXISTS(SELECT 1 FROM users WHERE email = ?)";
        $result = $this->db->query($stmt, $email);
        return $result->fetchColumn();
    }
}