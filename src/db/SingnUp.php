<?php include "database/DatabaseHandler.php"; ?>

<?php
class SignUp extends DatabaseHandler
{

    //TODO: Close connection to db
    function signUp($email, $password)
    {
        if ($this->validCredentials($email, $password)) {
            if (!$this->userExists($email)) {
                $this->queryInsecure(
                    "INSERT INTO users (email, password) VALUES ($email, $password)"
                );

                header("Location: login.php");
                exit();
            } else {
                echo "User exists!";
            }

        } else {
            echo "Invalid inputs";
        }
    }

    private function validCredentials($email, $password)
    {
        return
            $this->validEmail($email)
            && $this->validPassword($password);
    }

    private function userExists($email)
    {
        $stmt = "SELECT EXISTS(SELECT 1 FROM users WHERE email = $email)";
        $result = $this->queryInsecure($stmt);
        return $result->fetchColumn();
    }

    private function validEmail($email)
    {
        return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    private function validPassword($password)
    {
        return
            !empty($password)
            && !$this->blackListedPasswords($password)
            && $this->containsUppercase($password)
            && $this->containsLowercase($password)
            && $this->containsNumber($password)
            && $this->containsSpecialChars($password)
            && $this->validPasswordLength($password);
    }

    private function containsUppercase($string)
    {
        return preg_match('@[A-Z]@', $string);
    }

    private function containsLowercase($string)
    {
        return preg_match('@[a-z]@', $string);
    }
    private function containsNumber($string)
    {
        return preg_match('@[0-9]@', $string);
    }

    private function containsSpecialChars($string)
    {
        return preg_match('@[^\w]@', $string);
    }

    private function validPasswordLength($passwordStr, $required_length = 12)
    {
        return strlen($passwordStr) >= $required_length;
    }

    private function blackListedPasswords($passwordStr)
    {
        $blackListedPasswords = array_map('trim', file("blacklist.txt"));
        return !in_array($passwordStr, $blackListedPasswords);
    }
}
?>