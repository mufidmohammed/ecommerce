<?php 

session_start();

require_once('../db/database.php');
require_once('../partials/header.php');

$sql = "SELECT * FROM `products` WHERE 1";

$query = $conn->query($sql);

// $conn->close();

?>

<main class="main">

    <?php include_once('../partials/navbar.php') ?>

    <section class="py-0">
        <div class="container">
            <div class="row h-100">
                <div class="col-lg-7 mx-auto text-center mt-7 mb-5">
                    <h5 class="fw-bold fs-3 fs-lg-5 lh-sm">All Products</h5>
                </div>
                <div class="row h-100 align-items-center mb-4 g-2">
                    <?php while($product = $query->fetch_assoc()) :?>
                        <div class="col-sm-6 col-md-3 mb-3 mb-md-0 h-100">
                            <a href="details.php?id=<?= $product['id'] ?>">
                            <div class="card card-span h-100 text-white"><img class="img-fluid h-100"
                                    src="<?= '../assets/img/gallery/' . $product['image']; ?>" alt="..." />
                                <div class="card-img-overlay ps-0"> </div>
                                <div class="card-body ps-0 bg-200">
                                    <h5 class="fw-bold text-1000 text-truncate"><?= $product['name'] ?></h5>
                                    <div class="fw-bold"><span
                                            class="text-600 me-2 text-decoration-line-through">$200</span><span
                                            class="text-primary">Ghc<?= $product['price']; ?></span></div>
                                </div></a>
                            </div>
                        </div>
                    <?php endwhile ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once('../partials/footer.php') ?>
<?php $conn->close() ?>