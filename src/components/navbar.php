<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guitar lessons</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
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
                        <a class="nav-link active" aria-current="page" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pricing.php">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reviews.php">Reviews</a>
                    </li>


                    <?php if (isset($_SESSION["user"])) { ?>

                        <li class="nav-item">
                            <a class="nav-link" href="Account.php">Account</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="reviews.php"> User:
                                <?php echo $_SESSION["user"] ?>
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-danger" aria-current="page" href="/logout.php">Log out</a>
                        </li>

                    <?php } else { ?>
                        <a class="btn btn-primary" aria-current="page" href="/login.php">Sign in</a>

                    <?php } ?>

                    </li>
                </ul>
            </div>
        </div>
    </nav>