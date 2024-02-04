<?php

class EditFormValidator extends FormValidator
{
    protected $errors = [];
    public function validateFormData($formData)
    {
        $email = $formData["email"];
        $password = $formData["password"];
        $passwordRepeat = $formData["passwordRepeat"];
        $name = $formData["name"];
        
        $this->validateName($name);
        $this->validateEmail($email);
        if (!empty($password)) $this->validatePassword($password);
        $this->validatePasswordMatch($password, $passwordRepeat);

        return $this->errors;
    }

}

?>