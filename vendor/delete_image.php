<?php

session_start();
require_once "connect.php";

if(!isset($_SESSION["admin"])) {
    exit();
}

$id = $_POST["id"];
$image_path = $_POST["image_path"];
$deleted_img = str_replace("vendor/", "", $image_path);
$delete_item = isset($_POST["delete_item"]);

if ($delete_item == "Удалить") {
    mysqli_query($connect, "DELETE FROM `uploads` WHERE id = '$id';");
    unlink($deleted_img);
    header("Location: ../admin.php");
}

?>