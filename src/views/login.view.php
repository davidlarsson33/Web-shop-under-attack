<?php include base_path("src/views/partials/navbar.view.php"); ?>

<div class="container" style="max-width:600px">
    <h2 class="border-bottom pb-2">Log in</h2>
    <form action="/login" method="POST">
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

<?php include base_path("src/views/partials/footer.view.php"); ?>

<!-- 123AC!asdasdasd -->