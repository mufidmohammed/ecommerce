<?php 

require('../auth.php');
require('../../db/database.php');

$id = $_GET['id'];

$sql = "SELECT * FROM `products` WHERE `id` = '$id'";

$query = $conn->query($sql);

$product = $query->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $quantity = $_POST['quantity'];

    if ($image)
        $sql = "UPDATE `products` SET `name`='$name', `category`='$category', `price`='$price', `type`='$type', `description`='$description', `image`='$image', `quantity`='$quantity' WHERE `id`='$id' ";
    else
        $sql = "UPDATE `products` SET `name`='$name', `category`='$category', `price`='$price', `type`='$type', `description`='$description', `quantity`='$quantity' WHERE `id`='$id' ";

    $filename = $_FILES['image']['tmp_name'];
    $destination = '../../assets/img/gallery/' . $image;

    move_uploaded_file($filename, $destination);

    $conn->query($sql);

    $conn->close();

    header("location: index.php");
}

$conn->close();

?>

<?php include('../partials/header.php') ?>

<div class="container-fluid">
    <div class="row">

        <?php include('../partials/sidebar.php') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Products</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="index.php" class="btn btn-secondary">Back</a>
                </div>
            </div>
            <h2 class="my-4">Update product</h2>
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) . '?id=' . $id ?>" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="<?= $product['name'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Category</label>
                                <select name="category" class="form-control">
                                    <option value=""></option>
                                    <option <?php if($product['category'] === 'T-shirt') echo "selected"; ?> value="T-shirt">T-shirt</option>
                                    <option <?php if($product['category'] === 'shirt') echo "selected"; ?> value="shirt">Shirt</option>
                                    <option <?php if($product['category'] === 'shoe') echo "selected"; ?> value="shoe">Shoe</option>
                                    <option <?php if($product['category'] === 'watch') echo "selected"; ?> value="watch">Watch</option>
                                    <option <?php if($product['category'] === 'sunglass') echo "selected"; ?> value="sunglass">Sunglass</option>
                                    <option <?php if($product['category'] === 'bagpack') echo "selected"; ?> value="bagpack">Bagpack</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" name="price" value="<?= $product['price'] ?>" step="0.01"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Type</label>
                                <select name="type" class="form-control">
                                    <option value=""></option>
                                    <option <?php if($product['type'] === 'Men') echo "selected"; ?> value="Men">Men</option>
                                    <option <?php if($product['type'] === 'Women') echo "selected"; ?> value="Women">Women
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control"><?= $product['description'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="number" name="quantity" value="<?= $product['quantity'] ?>" step="1"
                                    class="form-control">
                            </div>
                            <div class="mb-3">

                                <label class="form-label">Image</label>
                                <input type="file" name="image" value="<?= $product['image'] ?>" step="0.01" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>


<?php include('../partials/footer.php') ?>