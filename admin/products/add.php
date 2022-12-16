<?php 

require('../../db/database.php');

$sql = "SELECT * FROM `products` WHERE 1";

$query = $conn->query($sql);

$name = $category = $price = $gender = $description = $image = $quantity = NULL;

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $gender = $_POST['gender'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO `products` (`name`, `category`, `price`, `gender`, `description`, `image`, `quantity`) 
                            VALUES ('$name', '$category', '$price', '$gender', '$description', '$image', '$quantity')";

    if ($conn->query($sql))
    {
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
                        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="<?= $name ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Category</label>
                                <input type="text" class="form-control" name="category" value="<?= $category ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" name="price" value="<?= $price ?> step=" 0.01"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-control">
                                    <option value=""></option>
                                    <option <?php if($gender === 'Male') echo "selected"; ?> value="Male">Male</option>
                                    <option <?php if($gender === 'Female') echo "selected"; ?> value="Female">Female
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