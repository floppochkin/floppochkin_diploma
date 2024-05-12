<?php

session_start();
require_once "connect.php";

if(!isset($_SESSION["admin"])) {
    exit();
}

$query = mysqli_query($connect, "SELECT * FROM `commission_status`");
$row = mysqli_fetch_assoc($query);
$ID = $row['id'];
$opened = "Открыты";
$closed = "Закрыты";

if($row['comm_status'] == "Закрыты") {
    $query_change = mysqli_query($connect, "UPDATE `commission_status` SET `comm_status` = '$opened' WHERE `id` = '$ID'");
    header("Location: ../admin.php");
} else {
    $query_change = mysqli_query($connect, "UPDATE `commission_status` SET `comm_status` = '$closed' WHERE `id` = '$ID'");
    header("Location: ../admin.php");
}

?>