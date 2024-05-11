<?php

session_start();
require_once "connect.php";

if(!isset($_SESSION["admin"])) {
    exit();
}

$id = $_POST["id"];
$delete_item = isset($_POST["delete_item"]);

if ($delete_item == "Удалить") {
    mysqli_query($connect, "DELETE FROM `uploads` WHERE id = '$id';");
    header("Location: ../admin.php");
}

?>