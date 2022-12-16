<?php

session_start();

session_destroy();

$location = '/ecommerce/auth/login.php';
header("location: {$location}");
