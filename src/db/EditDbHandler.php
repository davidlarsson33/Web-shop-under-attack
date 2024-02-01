<?php
class EditDbHandler extends SingletonDbHandler
{
    function __construct($config, $username, $password)
    {
        parent::__construct($config, $username, $password);
    }

    function update($oldEmail, $newName, $newEmail, $newPassword)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $stmt = "
        UPDATE `users` 
        SET `name`='$newName',`email`='$newEmail',`password`='$hashedPassword'
        WHERE email = '$oldEmail'";
        
        $this->db->queryInsecure($stmt);
    }
}
?>