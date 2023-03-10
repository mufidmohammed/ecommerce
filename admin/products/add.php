<?php require('../auth.php') ?>

<?php 

require('../../db/database.php');

$sql = "SELECT * FROM `products` WHERE 1";

$query = $conn->query($sql);

$name = $category = $price = $type = $description = $image = $quantity = NULL;
$file_error = NULL;

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $image = $_FILES['image']['name'];

    $sql = "INSERT INTO `products` (`name`, `category`, `price`, `type`, `description`, `image`, `quantity`) 
                            VALUES ('$name', '$category', '$price', '$type', '$description', '$image', '$quantity')";

    $file_name = $_FILES['image']['tmp_name'];
    $storage_path = '../../assets/img/gallery/' . $image;

    if (file_exists($storage_path))
    {
        $file_error = 'image already exist';
    } elseif (!$image) {
        $file_error = 'Image is required';
    }
     else 
    {
        if (!move_uploaded_file($file_name, $storage_path))
        {
            echo "Error moving image";
            return;
        };

        $conn->query($sql);

        $conn->close();


        header("location: index.php");

    }

}

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
            <h2 class="my-4">Add new product</h2>
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <!-- form -->
                        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="<?= $name ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Category</label>
                                <select name="category" class="form-control">
                                    <option value=""></option>
                                    <option <?php if($category === 'T-shirt') echo "selected"; ?> value="T-shirt">T-shirt</option>
                                    <option <?php if($category === 'shirt') echo "selected"; ?> value="shirt">Shirt</option>
                                    <option <?php if($category === 'shoe') echo "selected"; ?> value="shoe">Shoe</option>
                                    <option <?php if($category === 'watch') echo "selected"; ?> value="watch">Watch</option>
                                    <option <?php if($category === 'sunglass') echo "selected"; ?> value="sunglass">Sunglass</option>
                                    <option <?php if($category === 'bagpack') echo "selected"; ?> value="bagpack">Bagpack</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" name="price" value="<?= $price ?>" step="0.01"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Type</label>
                                <select name="type" class="form-control">
                                    <option value=""></option>
                                    <option <?php if($type === 'Men') echo "selected"; ?> value="Men">Men</option>
                                    <option <?php if($type === 'Women') echo "selected"; ?> value="Women">Women
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control"><?= $description ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="number" name="quantity" value="<?= $quantity ?>" step="1"
                                    class="form-control">
                            </div>
                            <div class="mb-3">

                                <label class="form-label">Image</label>
                                <input type="file" name="image" value="<?= $image ?>" step="0.01" class="form-control">
                                <div class="form-text text-danger"><?= $file_error ?></div>
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