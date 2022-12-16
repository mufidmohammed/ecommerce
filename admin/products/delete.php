<?php

require('../auth.php');

require('../../db/database.php');

$id = $_GET['id'];

$sql = "DELETE FROM `products` WHERE `id` = '$id'";

$conn->query($sql);

$conn->close();

header("location: index.php");
