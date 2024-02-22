<?php
class EditDbHandler extends SingletonDbHandler
{
    function __construct($config, $username, $password)
    {
        parent::__construct($config, $username, $password);
    }

    function validChangeOfEmail($email){
        $stmt = "SELECT password FROM users WHERE email = ?";
        $result = $this->db->query($stmt, $email);
        return empty($result->rowCount());
    }

    function update($oldEmail, $newName, $newEmail, $newPassword)
    {
        $stmt = "
        UPDATE `users` 
        SET `name`= ?, `email`= ? " . (!empty($newPassword) ? ", `password`='" . password_hash($newPassword, PASSWORD_DEFAULT) . "'" : "") .
        "WHERE email = ?";
        $this->db->query($stmt, $newName, $newEmail, $oldEmail);
    }
}
