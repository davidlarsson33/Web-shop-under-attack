<?php
class EditDbHandler extends SingletonDbHandler
{
    function __construct($config, $username, $password)
    {
        parent::__construct($config, $username, $password);
    }

    function validChangeOfEmail($email){
        $stmt = "SELECT password FROM users WHERE email = '$email'";
        $result = $this->db->queryInsecure($stmt);
        return empty($result->rowCount());
    }

    function update($oldEmail, $newName, $newEmail, $newPassword)
    {
        $stmt = "
        UPDATE `users` 
        SET `name`='$newName', `email`='$newEmail' " . (!empty($newPassword) ? ", `password`='" . password_hash($newPassword, PASSWORD_DEFAULT) . "'" : "") .
        "WHERE email = '$oldEmail'";
        $this->db->queryInsecure($stmt);
    }
}
