<?php include base_path("src/views/partials/navbar.view.php"); ?>

<style>
    .form-item {
        margin: 20px 0;
    }
</style>

<div class="container d-flex flex-column mt-5" style="max-width:600px">
    <h1>Account</h1>
    
    <?php include base_path("src/views/components/modal.view.php"); ?>

    <form action="/account" method="POST">

        <div class="form-item">
            <label for="">Username</label>
            <input type="text" name="name" class="form-control text-muted" value="<?= Session::get("user", "") ?>">
        </div>

        <div class="form-item">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" value="<?= Session::get("email", "") ?>">
        </div>

        <div class="form-item">
            <label for="">Change password</label>
            <input type="password" name="password"class="form-control">
        </div>

        <div class="form-item">
            <label for="">Confirm password</label>
            <input type="password" name="passwordRepeat" class="form-control">
        </div>

        <input type="hidden" name="_method" value="PATCH">

        <div class="form-item">
            <button class="btn btn-primary">Update</button>
        </div>
    </form>

    <form action="/account" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" class="btn btn-danger mt-3" value="Delete account">
    </form>

</div>


<?php include base_path("src/views/partials/footer.view.php"); ?>
