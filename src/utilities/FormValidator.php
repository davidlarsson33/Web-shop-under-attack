<?php

class FormValidator
{
    private $errors = [];
    public function validateFormData($formData)
    {
        $email = $formData["email"];
        $password = $formData["password"];
        $passwordRepeat = $formData["passwordRepeat"];
        $name = $formData["name"];
        $terms = $formData["terms&conditions"] ?? null;

        $this->validateName($name);
        $this->validateTerms($terms);
        $this->validateEmail($email);
        $this->validatePassword($password);
        $this->validatePasswordMatch($password, $passwordRepeat);

        return $this->errors;
    }

    private function validateName($email)
    {    
        if (empty($email)) {
            $this->appendToError("name", "You must use a name");
        }
    }

    private function validatePasswordMatch($password, $passwordRepeat)
    {

        if (empty($passwordRepeat)) {
            $this->appendToError("passwordRepeat", "You must repeat the password");
        } else if ($password != $passwordRepeat) {
            $this->appendToError("passwordRepeat", "Passwords do not match");
        }
    }

    private function validateTerms($terms)
    {
        if (!isset($terms)) {
            $this->appendToError("terms&conditions", "You must agree to terms & conditions");
        }
    }

    private function validateEmail($email)
    {
        if (empty($email)) {
            $this->appendToError("email", "You must provide an email");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->appendToError("email", "Email has the wrong format");
        }
    }

    private function validatePassword($password)
    {
        if (empty($password)) {
            $this->appendToError("password", "Password cannot be left empty");
        } else {
            $this->containsUppercase($password);
            $this->containsLowercase($password);
            $this->containsNumber($password);
            $this->containsSpecialChars($password);
            $this->validPasswordLength($password);
        }
    }

    private function containsUppercase($string)
    {
        if (!preg_match('@[A-Z]@', $string)) {
            $this->appendToError("password", "Lacks an uppercase letter");
        }
    }

    private function containsLowercase($string)
    {
        if (!preg_match('@[a-z]@', $string)) {
            $this->appendToError("password", "Lacks an lowercase letter");
        }
    }
    private function containsNumber($string)
    {
        if (!preg_match('@[0-9]@', $string)) {
            $this->appendToError("password", "Lacks a number");
        }
    }

    private function containsSpecialChars($string)
    {
        if (!preg_match('@[^\w]@', $string)) {
            $this->appendToError("password", "Lacks special characters");
        }
    }

    private function validPasswordLength($passwordStr, $required_length = 12)
    {
        if (!(strlen($passwordStr) >= $required_length)) {
            $this->appendToError("password", "Lacks a lenght of minimum 12 characters");
        }
    }

    private function appendToError($key, $value)
    {
        if (!is_null($this->errors[$key])) {
            $this->errors[$key] = $this->errors[$key] . "<br />"  . $value;
        } else {
            $this->errors[$key] = $value;
        }
    }
}

?>