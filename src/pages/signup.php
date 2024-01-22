<?php
include "../utilities/FormValidator.php";
include "../db/SignUpDbHandler.php";
session_start();
$errors = null;
$showModal = null;

if (isset($_POST["submit"])) {

    $validator = new FormValidator();
    $errors = $validator->validateFormData($_POST);

    if (sizeof($errors) === 0) {
        $db = new SignUpDbHandler(require "../db/configurations/dbconfig.php", 'db-username', 'db-password');
        $userExists = $db -> userExists($_POST["email"]);

        if($userExists){
            $showModal = true;
            
        } else{
            $email = $_POST["email"];
            $password = $_POST["password"];
            $name = $_POST["name"];

            $db -> signUp($name, $email, $password);

            header('Location: login');
            exit;
        }
    } 
}
?>


<?php include "../partials/navbar.php"; ?>

    <!-- Modal -->
    <div class="modal fade border-info" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header pt-2 border-info">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Could not sign up</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-5 ">
            Reason: Username is already taken
        </div>
        </div>
    </div>
    </div>

    <?php if ($showModal) : ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                myModal.show();
            });
        </script>
    <?php endif; ?>

     <!-- Modal -->

    <div class="container p-5" style="max-width:600px">
        <h1 class="border-bottom pb-2">Sign up!</h1>

        <form class="row g-3 needs-validation" novalidate action="signup" method="POST">

            <div class="col-12">
                <label for="validationCustom02" class="form-label">Name</label>

                <input 
                    required
                    type="text" 
                    name="name" 
                    id="validationCustom02"
                    value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"
                    class="form-control <?= $errors['name'] ? 'is-invalid' : ''; ?>"
                >

                <div class="invalid-feedback">
                    <?= $errors['name'] ?>
                </div>

            </div>

            <div class="col-12">
                <label for="validationCustomUsername" class="form-label">Email</label>
                <div class="input-group has-validation">

                    <input 
                        type="text" 
                        required
                        name="email"
                        id="validationCustomUsername"
                        aria-describedby="inputGroupPrepend"
                        class="form-control <?= $errors['email'] ? 'is-invalid' : ''; ?>"
                        value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" 
                    >

                    <div class="invalid-feedback">
                        <?= $errors['email'] ?>
                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustomUsername" class="form-label">Password</label>
                <div class="input-group has-validation">

                    <input 
                        type="text" 
                        required
                        name="password"
                        id="validationCustomUsername"
                        class="form-control <?= $errors['password'] ? 'is-invalid' : ''; ?>" 
                        value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" 
                        aria-describedby="inputGroupPrepend" 
                    >

                    <div class="invalid-feedback">
                        <?= $errors['password'] ?>
                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustomUsername" class="form-label">Repeat password</label>
                <div class="input-group has-validation">

                    <input 
                        type="text" 
                        required
                        name="passwordRepeat"
                        class="form-control <?= $errors['passwordRepeat'] ? 'is-invalid' : ''; ?>"
                        id="validationCustomUsername" 
                        aria-describedby="inputGroupPrepend" 
                        value="<?php if (isset($_POST['passwordRepeat'])) echo $_POST['passwordRepeat']; ?>" 
                    >

                    <div class="invalid-feedback">
                        <?= $errors['passwordRepeat'] ?>
                    </div>

                </div>
            </div>

            <div class="col-12">
                <div class="form-check">

                    <input 
                        required
                        class="form-check-input <?= $errors['terms&conditions'] ? 'is-invalid' : ''; ?>"
                        type="checkbox" 
                        name="terms&conditions" 
                        id="invalidCheck" 
                        <?php if (isset($_POST['terms&conditions'])) echo "checked" ?>
                    >

                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>

                    <div class="invalid-feedback">
                        <?= $errors['terms&conditions'] ?>
                    </div>

                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
            </div>

        </form>
    </div>

<?php include "../partials/footer.php"; ?>
