<?php 

require('../../db/database.php');
require('../../app/validation.php');

$validate = new Validation();

$name = $email = $phone_number = $password = $gender = NULL;
$utype = 'USR';

$duplicate_email = $duplicate_no = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $name = $validate->test_input($_POST['name']);
    $email = $validate->test_input($_POST['email']);

    $phone_number = $validate->test_input($_POST['phone_number']);
    $gender = $validate->test_input($_POST['gender']);
    $password = $validate->test_input($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $utype = $validate->test_input($_POST['utype']);

    $sql1 = "SELECT `id` FROM `users` WHERE `email`='$email' ";
    $sql2 = "SELECT `id` FROM `users` WHERE `phone_number`='$phone_number' ";
    $sql3 = "INSERT INTO `users` (`name`, `email`, `phone_number`, `gender`, `password`, `utype`) VALUES ('$name', '$email', '$phone_number', '$gender', '$hashed_password', '$utype')";
    $query1 = $conn->query($sql1);
    $query2 = $conn->query($sql2);

    if ($query1->num_rows > 0)
        $duplicate_email = "Email already exists";    
    elseif ($query2->num_rows > 0)
        $duplicate_no = "Phone number already exist";
    elseif ($conn->query($sql3)) {
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
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="<?= $email ?>">
                                <div class="form-text text-danger"><?= $duplicate_email ?></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone number</label>
                                <input type="number" name="phone_number" value="<?= $phone_number ?>"
                                    class="form-control">
                                    <div class="form-text text-danger"><?= $duplicate_no ?></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="text" name="password" value="<?= $password ?>"
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
                                <label class="form-label">User type</label>
                                <select name="gender" class="form-control">
                                    <option value=""></option>
                                    <option <?php if($utype === 'USR') echo "selected"; ?> value="USR">User</option>
                                    <option <?php if($utype === 'ADM') echo "selected"; ?> value="ADM">Admin</option>
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