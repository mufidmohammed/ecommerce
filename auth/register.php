<?php

require_once('../app/validation.php');
require_once('../db/database.php');

$error = false;

$name = $email = $phone_number = $password = $confirm_password = $gender = '';

$message = [
    'name' => '',
    'email' => '',
    'phone_number' => '',
    'password' => '',
    'gender' => ''
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $validate = new Validation();

    $name = $validate->test_input($_POST['name']);
    $message['name'] = $validate->name($name);

    $email = $validate->test_input($_POST['email']);
    $message['email'] = $validate->email($email);

    if (empty($message['email']))
    {
        $sql = "SELECT `id` FROM `users` WHERE `email` = '$email' ";

        $query = $conn->query($sql);

        if ($query->num_rows > 0)
        {
            $message['email'] = 'Email already exist';
        }
    }

    $phone_number = $validate->test_input($_POST['phone_number']);
    $message['phone_number'] = $validate->phone_number($phone_number);

    if (empty($message['phone_number']))
    {
        $sql = "SELECT `id` FROM `users` WHERE `phone_number` = '$phone_number' ";
        $query = $conn->query($sql);

        if ($query->num_rows > 0)
            $message['phone_number'] = 'Phone number already exist';

    }

    $password = $validate->test_input($_POST['password']);
    $confirm_password = $validate->test_input($_POST['confirm_password']);
    $message['password'] = $validate->password($password, $confirm_password);


    $gender = $validate->test_input($_POST['gender']);
    $message['gender'] = $validate->gender($gender);


    // check whether all inputs are valid
    foreach($message as $error_msg) {
        if (!empty($error_msg))
        {
            $error = true;
            break;
        }
    }

    if (!$error)
    {
        
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO   `users` 
                (`name`, `email`, `phone_number`, `password`, `gender`) 
                VALUES 
                ('$name', '$email', '$phone_number', '$password', '$gender')";
            
        // if ($conn -> query($sql)) 
        // {
        //     $location = './login.php';

        //     header("location: {$location}");
        // }

        $conn->query($sql);

        $location = './login.php';

        header("location: {$location}");
    }

}


?>

<?php require_once('../partials/header.php') ?>

<div class="container">
    <div class="form d-flex justify-content-center m-6 p-6" style="background-color: #f9f9f9; border-radius: 1rem">

        <form style="width: 40rem" method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <h1 class="fs-4 fs-lg-8 fs-md-6 fw-normal" style="text-align: center;">Sign Up</h1>

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="<?= $name ?>" class="form-control">
                <div class="form-text text-danger"> <?= $message['name'] ?> </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" value="<?= $email ?>" class="form-control">
                <div class="form-text text-danger"><?= $message['email'] ?></div>
            </div>

            <div class="mb-3">
                <label class="form-label">Phone number</label>
                <input type="number" name="phone_number" value="<?= $phone_number ?>" class="form-control">
                <div class="form-text text-danger"><?= $message['phone_number'] ?></div>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" value="<?= $password ?>" class="form-control">
                <div class="form-text text-danger"><?= $message['password'] ?></div>
            </div>

            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" value="<?= $confirm_password ?>" class="form-control">
            </div>

            <h5 class="m-0 p-0">Gender</h5>
            <div class="mb-3 form-check">
                <input type="radio" name="gender" value="M" class="form-check-input">
                <label class="form-check-label">Male</label>
                <br />
                <input type="radio" name="gender" value="F" class="form-check-input">
                <label class="form-check-label">Female</label>
                <br>
                <div class="form-text text-danger"><?= $message['gender'] ?></div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</div>

<?php require_once('../partials/footer.php') ?>