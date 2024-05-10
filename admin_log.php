<?php
session_start();
if(isset($_SESSION["admin"])){
    header("Location:admin.php");
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
    <div class="site">
        <header><center><h1>Админская панель</h1></center></header>
        <div class="login_form">
            <form action="vendor/auth.php" method="POST" class="log-f">
                <input name="login" type="text" placeholder="Логин" required></input>
                <input name="pass" type="password" placeholder="Пароль" required></input>
                <input type="submit" value="Войти"></input>
            </form>
            <?php
                if(isset($_SESSION['message'])){
                    echo '<div class="msg">' . $_SESSION['message'] .'</div>';
                }
                unset($_SESSION['message']);
            ?>
        </div>
        
    </div>
</body>
</html>