
<?php include "DatabaseHandler.php"; ?>

<?php
    class LoginDbHandler extends DatabaseHandler {

        function login($email, $password){

            // Not secure. User input is not sanitized/escaped
            $stmt = "SELECT password FROM users WHERE email = '$email'"; 
            $result = $this -> queryInsecure($stmt);                    

            if($result->rowCount() == 0 ){
                echo "Username '$email' or password is incorrect!"; // used for XSS
            }else{
                $storedHash = $result->fetch(PDO::FETCH_ASSOC)["password"];

                if(password_verify($password, $storedHash)){
                    echo 'Logged in!';
                    return true;
                } else{
                    echo "Username or password is incorrect!";
                }
            }
            return false;
        }
    }
?>