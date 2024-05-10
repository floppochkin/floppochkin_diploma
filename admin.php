<?php
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
<div class="site">
        <header><center><h1>Админская панель</h1></center><a href="vendor/logout.php">Выйти</a></header>
        <div class="add_pic">
            <h2>Загрузить изображение в галерею</h2><br>
            <form action="vendor/pic_upload.php" enctype="multipart/form-data" method="post" class="add_pic_form">
                <input type="file" name="image" multiple accept="image/*,image/png,image/jpeg"><br>
                <input type="submit" value="Загрузить">
            </form>
            <?php
                if(isset($_SESSION['upload_status'])){
                    echo '<br><div class="msg">' . $_SESSION['upload_status'] .'</div>';
                }
                unset($_SESSION['upload_status']);
            ?>
        </div>
    </div>
</body>
</html>