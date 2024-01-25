<?php require "head.php" ?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Guitar lessons</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContentwq" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pricing">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reviews">Reviews</a>
                </li>


                <?php if (isset($_SESSION["user"])) { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="account">Account</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="account"> User:
                            <?= $_SESSION["user"] ?>
                        </a>
                    </li>

                    <form action="/logout" method="POST">
                        <li>
                            <input type="submit" class="btn btn-danger" value="log out">
                        </li>
                    </form>


                <?php } else { ?>
                    <a class="btn btn-primary" aria-current="page" href="login">Sign in</a>

                <?php } ?>

                </li>
            </ul>
        </div>
    </div>
</nav>