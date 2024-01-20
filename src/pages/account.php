<?php session_start(); ?>

<!DOCTYPE html>

<style>
    .form-item {
        margin: 20px 0;
    }
</style>
<html lang="en">
<?php include "../components/navbar.php"; ?>

<div class="container d-flex flex-column mt-5" style="max-width:600px">
    <h1>
        Account
    </h1>

    <form action="">

        <div class="form-item">
            <label for="">Username</label>
            <input type="text" class="form-control text-muted" value="<?php echo $_SESSION["user"] ?>">
        </div>

        <div class="form-item">
            <label for="">Email</label>
            <input type="text" class="form-control" value="<?php echo $_SESSION["email"] ?>">
        </div>

        <div class="form-item">
            <label for="">Change password</label>
            <input type="password" class="form-control">
        </div>

        <div class="form-item">
            <label for="">Confirm password</label>
            <input type="password" class="form-control">
        </div>

        <div class="form-item">
            <button class="btn btn-primary">Update</button>
        </div>
    </form>

    <button class="btn btn-danger mt-3">Delete account</button>

</div>


<?php include "../components/footer.php"; ?>

</html>