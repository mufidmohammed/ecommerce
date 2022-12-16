<?php

require('../auth.php');
require('../../db/database.php');

$sql = "SELECT * FROM `products` WHERE 1";

$query = $conn->query($sql);

$count = 0;

include('../partials/header.php');

?>

<div class="container-fluid">
    <div class="row">

        <?php include('../partials/sidebar.php') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Products</h1>
            </div>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-3 mb-1">
                <h2 class="my-4">All products</h2>
                <a class="btn btn-secondary" href="add.php">Add product</a>
            </div>


            <div class="table-responsive">
                <table class="table table-striped" id="table-products">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($product = $query->fetch_assoc()) : ?>
                        <tr class="text-center">
                            <td><?= ++$count ?></td>
                            <td><img src="<?= '/ecommerce/assets/img/gallery/' . $product['image'] ?>" width="80"
                                    height="80" /></td>
                            <td><?= $product['name'] ?></td>
                            <td><?= $product['price'] ?></td>
                            <td><?= $product['quantity'] ?></td>
                            <td>
                                <div class="btn-group me-2">
                                    <a href="edit.php?id=<?= $product['id'] ?>" class="btn btn-primary">Edit</a>
                                    <a href="delete.php?id=<?= $product['id'] ?>" class="btn btn-danger">Remove</a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<?php include('../partials/footer.php') ?>
<script>
    $('#table-products').DataTable({});
</script>