<?php

session_start();

require_once('../db/database.php');
require_once('../app/validation.php');

$errors = [
    'email' => '',
    'password' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{

    $validate = new Validation();

    $email = $validate->test_input($_POST['email']);
    $password = $validate->test_input($_POST['password']);

    if (empty($email)){
        $errors['email'] = 'Enter your email';
    } 
    else if (empty($password))
    {
        $errors['password'] = 'Enter your password';
    } else 
    {
        $sql = "SELECT * from `users` WHERE `email` = '$email' ";

        $query = $conn->query($sql);

        if ($query->num_rows > 0)
        {
            $data = $query->fetch_assoc();
            $hashed_password = $data['password'];

            if (password_verify($password, $hashed_password))
            {
                // authenticate user
                $_SESSION['auth'] = true;

                if ($data['utype']  === 'ADM')
                {
                    $_SESSION['auth_admin'] = true;
                }

                // close connection and redirect to homepage
                $conn->close();

                $location = '../public/index.php';

                header("location: {$location}");
            } else {
                $errors['password'] = 'Invalid password';
            }
        }
        else {
            $errors['email'] = 'Invalid email';
        }
    }

}

// close connection
$conn->close();

?>
<?php require_once('../partials/header.php') ?>

<div class="container">
    <div class="form d-flex justify-content-center m-6 p-6" style="background-color: #f9f9f9; border-radius: 1rem">

        <form style="width: 40rem" method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <h1 class="fs-4 fs-lg-8 fs-md-6 fw-normal" style="text-align: center;">Login</h1>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control">
                <div class="form-text text-danger"><?= $errors['email'] ?></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
                <div class="form-text text-danger"><?= $errors['password'] ?></div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php require_once('../partials/footer.php') ?>