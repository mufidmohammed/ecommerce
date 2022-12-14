<?php

session_start();

session_destroy();

$location = 'login.php';
header("location: {$location}");
