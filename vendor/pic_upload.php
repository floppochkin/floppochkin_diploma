<?php
session_start();
require_once "connect.php";
define('MB', 1048576);

if(!isset($_SESSION["admin"])) {
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(empty($_FILES["image"]["name"])) { // Валидация в случае того, если пользователь забыл загрузить картинку и нажал на "загрузить"
		$_SESSION['upload_status']='Выберите файл';
        header('Location:../admin.php');
        exit();
    }

    if($_FILES["image"]["size"] == 0) { // Валидация размера файла
		$_SESSION['upload_status']='Файл слишком большой';
        header('Location:../admin.php');
        exit();
    }

    if($_FILES["image"]["size"] > 5*MB) { // Валидация размера файла
		$_SESSION['upload_status']='Файл слишком большой';
        header('Location:../admin.php');
        exit();
    }

    $getFormat = explode('.', $_FILES["image"]["name"]); // Валидация формата файла
	$format = strtolower(end($getFormat));
	$types = array('jpg', 'png','jpeg');
    
	if(!in_array($format, $types)) {
        $_SESSION['upload_status']='Недопустимый формат файла';
        header('Location:../admin.php');
        exit();
    }

    $path = "../vendor/uploads/";
    $targetDir = "vendor/uploads/";
    $image_path = $targetDir . basename($_FILES["image"]["name"]);

	if (!@copy($_FILES['image']['tmp_name'], $path. $_FILES['image']['name'])) {
        $_SESSION['upload_status']='Ошибка загрузки';
        header('Location:../admin.php');
        exit();
    }
	else {
        $upload_date = date("M d Y", filemtime($_FILES['image']['tmp_name']));
        $upload = mysqli_query($connect, "INSERT INTO `uploads` (`id`, `image_path`, `upload_date`) VALUES (NULL, '$image_path', '$upload_date')");
        $_SESSION['upload_status']='Файл загружен';
        header('Location:../admin.php');

    }
};

?>