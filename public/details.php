<?php

session_start();

include_once('../partials/header.php');

?>
<main class="main">

    <?php include_once('../partials/navbar.php') ?>

    <section>

        <div class="container">
            <div class="row h-100 g-0">
                <div class="col-md-6">
                    <div class="bg-300 p-4 h-100 d-flex flex-column justify-content-center">
                        <h3>Gentle Formal Looks </h3>
                        <p class="mb-5 fs-1">We provide the top formal apparel package to make your job look
                            confident
                            and comfortable. Stay connect.</p>
                        <p>Availability: <span class="text-primary">In Stock</span></p>
                        <p>Cost Price: <span class="text-success">$40.00</span></p>
                        <div class="d-grid gap-2 d-md-block"><a class="btn btn-lg btn-dark" href="#!"
                                role="button">Add to cart</a></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-span h-100 text-white"><img class="card-img h-100"
                            src="../assets/img/gallery/flat-hill.png" alt="..." /><a class="stretched-link"
                            href="#!"></a></div>
                </div>
            </div>
        </div>

    </section>
</main>

<?php include_once('../partials/navbar.php') ?>
