<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<?php
include "../utilities/FormValidator.php";
// Server side validation
$errors = null;

if (isset($_POST["submit"])) {

    $validator = new FormValidator();
    $errors = $validator->validateFormData($_POST);

    if (sizeof($errors) == 0) {
       // TODO:
    } 
}

?>

<body>

    <?php include "../components/navbar.php"; ?>

    <div class="container p-5" style="max-width:600px">
        <h1 class="border-bottom pb-2">Sign up!</h1>

        <form class="row g-3 needs-validation" novalidate action="signup.php" method="POST">

            <div class="col-12">
                <label for="validationCustom02" class="form-label">Name</label>

                <input 
                    required
                    type="text" 
                    name="name" 
                    id="validationCustom02"
                    value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"
                    class="form-control <?php echo $errors['name'] ? 'is-invalid' : ''; ?>"
                >

                <div class="invalid-feedback">
                    <?php echo $errors['name'] ?>
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
                        class="form-control <?php echo $errors['email'] ? 'is-invalid' : ''; ?>"
                        value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" 
                    >

                    <div class="invalid-feedback">
                        <?php echo $errors['email'] ?>
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
                        class="form-control <?php echo $errors['password'] ? 'is-invalid' : ''; ?>" 
                        value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" 
                        aria-describedby="inputGroupPrepend" 
                    >

                    <div class="invalid-feedback">
                        <?php echo $errors['password'] ?>
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
                        class="form-control <?php echo $errors['passwordRepeat'] ? 'is-invalid' : ''; ?>"
                        id="validationCustomUsername" 
                        aria-describedby="inputGroupPrepend" 
                        value="<?php if (isset($_POST['passwordRepeat'])) echo $_POST['passwordRepeat']; ?>" 
                    >

                    <div class="invalid-feedback">
                        <?php echo $errors['passwordRepeat'] ?>
                    </div>

                </div>
            </div>

            <div class="col-12">
                <div class="form-check">

                    <input 
                        required
                        class="form-check-input <?php echo $errors['terms&conditions'] ? 'is-invalid' : ''; ?>"
                        type="checkbox" 
                        name="terms&conditions" 
                        id="invalidCheck" 
                        <?php if (isset($_POST['terms&conditions'])) echo "checked" ?>
                    >

                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>

                    <div class="invalid-feedback">
                        <?php echo $errors['terms&conditions'] ?>
                    </div>

                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
            </div>

        </form>
    </div>

</body>

</html>