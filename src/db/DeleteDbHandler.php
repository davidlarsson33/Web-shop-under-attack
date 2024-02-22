<?php
class DeleteDbHandler extends SingletonDbHandler
{
    function __construct($config, $username, $password)
    {
        parent::__construct($config, $username, $password);
    }

    function delete($email)
    {
        $stmt = "DELETE FROM users WHERE email = ?";
        $this->db->query($stmt, $email);
    }
}