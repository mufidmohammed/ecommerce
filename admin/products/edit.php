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
    $gender = $_POST['gender'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE `products` SET `name`='$name', `category`='$category', `price`='$price', `gender`='$gender', `description`='$description', `image`='$image', `quantity`='$quantity' WHERE `id`='$id' ";

    if ($conn->query($sql))
    {
        header("location: index.php");
    }
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
                        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) . '?id=' . $id ?>" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="<?= $product['name'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Category</label>
                                <input type="text" class="form-control" name="category" value="<?= $product['category'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" name="price" value="<?= $product['price'] ?>" step="0.01"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-control">
                                    <option value=""></option>
                                    <option <?php if($product['gender'] === 'Male') echo "selected"; ?> value="Male">Male</option>
                                    <option <?php if($product['gender'] === 'Female') echo "selected"; ?> value="Female">Female
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