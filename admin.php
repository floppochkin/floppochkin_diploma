<?php
require_once "vendor/connect.php";
session_start();
if(!isset($_SESSION["admin"])){
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.min.css">
    <title>Document</title>
</head>
<body>
    ADMIN PANEL
</body>
</html>