<?php

require('../auth.php');
require('../../db/database.php');

$sql = "SELECT * FROM `users` WHERE 1";

$query = $conn->query($sql);

$counter = 0;

include('../partials/header.php');

?>

<div class="container-fluid">
    <div class="row">

        <?php include('../partials/sidebar.php') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Users</h1>
            </div>

            <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-3 mb-1">
                <h2 class="my-4">All Users</h2>
                <a href="add.php" class="btn btn-secondary">Add User</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="table-users">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone number</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($user = $query->fetch_assoc()) : ?>
                        <tr>
                            <td><?= ++$counter ?></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['phone_number'] ?></td>
                            <td>
                                <div class="btn-group me-2">
                                    <a href="edit.php?id=<?= $user['id'] ?>" class="btn btn-primary">Edit</a>
                                    <a href="delete.php?id=<?= $user['id'] ?>" class="btn btn-danger">Remove</a>
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
$('#table-users').DataTable({});
</script>