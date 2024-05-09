<?php

session_start();

require_once 'connect.php';

$login = $_POST['login'];
/* $pass = md5($_POST['pass']); */
$pass = $_POST['pass'];

$query = mysqli_query($connect, "SELECT * FROM `admins` WHERE `login` = '$login' and `pass` = '$pass'");
$log_query = mysqli_query($connect, "SELECT * FROM `admins` WHERE `login`='$login'");
$log_num_rows = mysqli_num_rows($log_query);
$pass_query = mysqli_query($connect, "SELECT * FROM `admins` WHERE `pass`='$pass'");
$pass_num_rows = mysqli_num_rows($pass_query);

if ($log_num_rows == 0) {
    $_SESSION['message']='Неверный логин';
        header('Location:../admin_log.php');  
}else {
    if ($pass_num_rows == 0) {
        $_SESSION['message']='Неверный пароль';
        header('Location:../admin_log.php'); 
    } else {
        if(mysqli_num_rows($query) > 0){ 
            $admin = mysqli_fetch_assoc($query);

            $_SESSION['admin'] = [
                "id" => $admin['id'],
                "login" => $admin['login'],
            ];
            header('Location: ../admin.php');
        } else {
            $_SESSION['message']='Непредвиденная ошибка';
            header('Location:../admin_log.php'); 
        }
    }
}

?>