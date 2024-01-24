<?php
session_start();
?>

<?php include base_path("src/partials/navbar.php"); ?>


<section id="intro" class="p-4">
    <div class="container-lg mt-3">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-7 text-center text-md-start">
                <h2>
                    <div class="display-2">RiffRealm Guitars</div>
                    <div class="display-6 text-muted">Learn guitar today!</div>
                </h2>
                <p class="text-muted">Get your hands dirty and play your favorite solos</p>
                <a href="#" class="btn btn-secondary">Contact us!</a>
            </div>
            <div class="col-md-5 text-center d-none d-md-block">
                <img class="img-fluid rounded" width="100%" src="/assets/lesson.png" alt="">
            </div>
        </div>
    </div>
</section>

<?php include base_path("src/partials/footer.php"); ?>
