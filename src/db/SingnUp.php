<?php include "database/DatabaseHandler.php"; ?>
<?php include "database/DatabaseHandler.php"; ?>

<?php
class SignUp extends DatabaseHandler
{   
    private $formValidator;
    public function __construct(){
        $this -> formValidator = new FormValidator();
    }
    

    //TODO: Close connection to db
    function signUp($formData)
    {
        $errors = $this->formValidator->validCredentials($formData);
        if (sizeof($errors) == 0) {
            // if (!$this->userExists($email)) {
            //     $this->queryInsecure(
            //         "INSERT INTO users (email, password) VALUES ($email, $password)"
            //     );

            //     header("Location: login.php");
            //     exit();
            // } else {
            //     echo "User exists!";
            // }

        } else {
            return array("a"=>12);
        }
    }


    private function userExists($email)
    {
        $stmt = "SELECT EXISTS(SELECT 1 FROM users WHERE email = $email)";
        $result = $this->queryInsecure($stmt);
        return $result->fetchColumn();
    }

}
?>