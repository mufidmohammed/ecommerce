<?php 

require('../../db/database.php');

$id = $_GET['id'];

$sql = "SELECT * FROM `users` WHERE `id`='$id' ";

$query = $conn->query($sql);
$user = $query->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $utype = $_POST['utype'];

    $sql = "UPDATE `users` SET `name`='$name', `gender`='$gender', `utype`='$utype' WHERE `id`='$id'";
    $conn->query($sql);
    header("location: index.php");
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
                        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?id=<?= $id ?>" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="<?= $user['name'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control disabled" value="<?= $user['email'] ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone number</label>
                                <input type="number" value="<?= $user['phone_number'] ?>"
                                    class="form-control" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="text" value="************" class="form-control" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-control">
                                    <option <?php if($user['gender'] === 'Male') echo "selected"; ?> value="Male">Male</option>
                                    <option <?php if($user['gender'] === 'Female') echo "selected"; ?> value="Female">Female
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">User type</label>
                                <select name="utype" class="form-control">
                                    <option <?php if($user['utype'] === 'USR') echo "selected"; ?> value="USR">User</option>
                                    <option <?php if($user['utype'] === 'ADM') echo "selected"; ?> value="ADM">Admin</option>
                                </select>
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