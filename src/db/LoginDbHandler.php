<?php include "DatabaseHandler.php"; ?>
<?php
class LoginDbHandler extends DatabaseHandler
{

    function login($email, $password)
    {

        // Not secure. User input is not sanitized/escaped
        $stmt = "SELECT password FROM users WHERE email = '$email'";
        $result = $this->queryInsecure($stmt);
        $error = null;

        if (is_bool($result)) {
            return false;

        } else if ($result->rowCount() === 0) {
            $error = "Username '$email' or password is incorrect!"; // used for XSS

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