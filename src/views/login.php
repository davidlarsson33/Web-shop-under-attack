<?php
session_start();

include_once base_path("src/db/LoginDbHandler.php");
include_once base_path("src/db/DatabaseHandler.php");
$dbConfig = require_once base_path("src/db/configurations/dbconfig.php");

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $db = new LoginDbHandler($dbConfig, 'db-username', 'db-password');
    $errors = $db->login($email, $password);

    if (empty($errors)) {
        $db = DatabaseHandler::getInstance($dbConfig, 'db-username', 'db-password');

        $result = $db->queryInsecure("SELECT name FROM users WHERE email = '$email'");
        $name = $result->fetch(PDO::FETCH_ASSOC)["name"];
        $_SESSION["user"] = $name;
        $_SESSION["email"] = $email;

        header('Location: /');

    } else {
        echo "NOT OK";
    }
}
?>


<?php include base_path("src/views/partials/navbar.php"); ?>


<div class="container" style="max-width:600px">
    <h2 class="border-bottom pb-2">Log in</h2>
    <form method="POST">
        <div class="form-group mb-3">
            <label for="exampleInputEmail1">Email address</label>
            <input name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter email">
            <div>

            </div>
        </div>
        <div class="form-group mb-3">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                placeholder="Password">
        </div>

        <div class="col-12">
            <span> Not a member? <a href="/signup">Sign up</a></span>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include base_path("src/views/partials/footer.php"); ?>

<!-- 123AC!asdasdasd -->