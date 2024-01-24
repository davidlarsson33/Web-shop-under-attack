<?php session_start(); ?>

<?php include base_path("src/partials/navbar.php"); ?>

<section id="pricing" class="bg-light mt-5 pt-3 pb-3">
    <div class="container-lg">
        <div class="text-center">
            <h2>Pricing Plans</h2>
            <p class="lead text-muted">Choose a pricing plan that suits you.</p>
        </div>

        <div class="row my-5 g-0 align-items-center justify-content-center">
            <div class="col-8 col-lg-4 col-xl-3">
                <div class="card border-0">
                    <div class="card-body text-center py-4">
                        <h4 class="card-title">Starter Edition</h4>
                        <p class="lead card-subtitle">Remote lessons only</p>
                        <p class="display-5 my-4 text-primary fw-bold">$10.99 <span class="small">/mo</span></p>
                        <p class="card-text mx-5 text-muted d-none d-lg-block">Begin your journey with 'Starter
                            Edition.' Access essential features, kickstart your experience, and enjoy a budget-friendly
                            introduction to excellence. Start now!</p>
                        <a href="#" class="btn btn-outline-primary btn-lg mt-3">
                            Buy Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-8 col-lg-4">
                <div class="card border-primary border-2">
                    <div class="card-header text-center text-primary">Most Popular</div>
                    <div class="card-body text-center py-5">
                        <h4 class="card-title">Complete Edition</h4>
                        <p class="lead card-subtitle">Hybrid solution</p>
                        <p class="display-4 my-4 text-primary fw-bold">$15.99 <span class="small">/mo</span></p>
                        <p class="card-text mx-5 text-muted d-none d-lg-block">Exclusive bundle: 'Complete
                            Edition'—ultimate value, premium features, unbeatable price. Elevate your experience with
                            this limited-time offer. Grab yours now!</p>
                        <a href="#" class="btn btn-outline-primary btn-lg mt-3">
                            Buy Now
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-8 col-lg-4 col-xl-3">
                <div class="card border-0">
                    <div class="card-body text-center py-4">
                        <h4 class="card-title">Ultimate Edition</h4>
                        <p class="lead card-subtitle">Real life essons in real life</p>
                        <p class="display-5 my-4 text-primary fw-bold">$23.99 <span class="small">/mo</span></p>
                        <p class="card-text mx-5 text-muted d-none d-lg-block">Unleash the extraordinary with 'Ultimate
                            Edition.' Packed with exclusive content, cutting-edge features, and unmatched value. Upgrade
                            your experience!</p>
                        <a href="#" class="btn btn-outline-primary btn-lg mt-3">
                            Buy Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include base_path("src/partials/footer.php"); ?>
