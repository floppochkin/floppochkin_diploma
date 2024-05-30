<?php

session_start();
require_once "connect.php";

if(!isset($_SESSION["admin"])) {
    exit();
}

$query = mysqli_query($connect, "SELECT * FROM `commission_status`");
$row = mysqli_fetch_assoc($query);
$id = $_POST['id'];
$new_price = $_POST['new_price'];

$query = mysqli_query($connect, "UPDATE `pricelist` SET `price` = '$new_price' WHERE `id` = '$id';");
header("Location: ../admin.php");
?>