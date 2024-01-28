<?php include base_path("src/views/partials/navbar.view.php"); ?>

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

    <?php if ($showModal ?? false) : ?>
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

        <form class="row g-3 needs-validation" action="/signup" novalidate method="POST">

            <div class="col-12">
                <label for="validationCustom02" class="form-label">Name</label>

                <input 
                    required
                    type="text" 
                    name="name" 
                    id="validationCustom02"
                    value="<?= $_POST['name'] ?? ''; ?>"
                    class="form-control <?= isset($errors['name']) ? 'is-invalid' : '';?>"
                >

                <div class="invalid-feedback">
                    <?= $errors['name'] ?? ''?>
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
                        class="form-control <?= isset($errors['email']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['email'] ?? ''; ?>" 
                    >

                    <div class="invalid-feedback">
                        <?= $errors['email'] ?? ''?>
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
                        class="form-control <?= isset($errors['password']) ? 'is-invalid' : ''; ?>" 
                        value="<?= $_POST['password'] ?? ''; ?>" 
                        aria-describedby="inputGroupPrepend" 
                    >

                    <div class="invalid-feedback">
                        <?= $errors['password'] ?? '' ?>
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
                        class="form-control <?= isset($errors['passwordRepeat']) ? 'is-invalid' : ''; ?>"
                        id="validationCustomUsername" 
                        aria-describedby="inputGroupPrepend" 
                        value="<?= $_POST['passwordRepeat'] ?? ''; ?>" 
                    >

                    <div class="invalid-feedback">
                        <?= $errors['passwordRepeat'] ?? '' ?>
                    </div>

                </div>
            </div>

            <div class="col-12">
                <div class="form-check">

                    <input 
                        required
                        class="form-check-input <?php $errors['terms&conditions'] ?? 'is-invalid' ?>"
                        type="checkbox" 
                        name="terms&conditions" 
                        id="invalidCheck" 
                        <?= isset($_POST['terms&conditions']) ? 'checked': ''?>
                    >
                    <label class="f
                    orm-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>

                    <div class="invalid-feedback">
                        <?= $errors['terms&conditions'] ?? '' ?>
                    </div>

                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
            </div>

        </form>
    </div>

    <?php include base_path("src/views/partials/footer.view.php"); ?>
