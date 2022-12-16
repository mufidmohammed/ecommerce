<?php

if (!isset($_SESSION['auth_admin']))
{
    $path = '/ecommerce/auth/logout.php';

    header("location: {$path}");
}
