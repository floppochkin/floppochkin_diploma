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

    <link rel="stylesheet" href="assets/css/gallery.style.css">
    <link rel="stylesheet" href="assets/css/style.min.css">

    <script src="assets/js/jquery-3.7.1.min.js"></script>

    <title>Document</title>
</head>
<body>
<div class="site">
        <header class="adm_h"><h1>Админская панель</h1><a href="vendor/logout.php">Выйти</a></header>
        <div class="change_comm_status">
            <div class="comm_status">
                <div class="status_of">Статус заказов:</div>
                <?php 
                    require_once "vendor/connect.php";
                    $query = mysqli_query($connect, "SELECT * FROM `commission_status`");
                    $query_num_rows = mysqli_num_rows($query);
                    if ($query_num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            printf("<div class='orders'>" . $row['comm_status'] . "</div>");
                            $query_num_rows = ($query_num_rows - 1);
                        }
                        printf("<form action='vendor/change_comm_status.php' method='POST'>");
                        printf("<input style='margin-top: 15px;'  name='change_status' type='submit' value='Изменить статус'>");
                        printf("</form>");
                    }
                ?>
            </div>
            <div class="pricelist">
                <div style='padding-bottom: 15px;' class="status_of"><h2>Ценовой лист</h2></div>
                <?php 
                    require_once "vendor/connect.php";
                    $query = mysqli_query($connect, "SELECT * FROM `pricelist` WHERE `id` = 1");
                    $query_num_rows = mysqli_num_rows($query);
                    if ($query_num_rows > 0) {
                        printf("<form action='vendor/change_price.php' method='POST'>");
                        while ($row = mysqli_fetch_assoc($query)) {
                            printf("<div style='padding: 10px;' class='prices'>Портрет: " . $row['price'] . " руб</div>");
                            printf("<input type='hidden' name='id' value='" . $row['id'] . "'>");
                            printf("<input type='text' pattern='\d*' placeholder='Введите новую цену' name='new_price'>");
                            printf("<input name='change_status' type='submit' value='Изменить цену'>");
                            $query_num_rows = ($query_num_rows - 1);
                        }
                        printf("</form>");
                    }
                ?>
                <?php 
                    require_once "vendor/connect.php";
                    $query = mysqli_query($connect, "SELECT * FROM `pricelist` WHERE `id` = 2");
                    $query_num_rows = mysqli_num_rows($query);
                    if ($query_num_rows > 0) {
                        printf("<form action='vendor/change_price.php' method='POST'>");
                        while ($row = mysqli_fetch_assoc($query)) {
                            printf("<div style='padding: 10px;' class='prices'>Картина в полный рост: " . $row['price'] . " руб</div>");
                            printf("<input type='hidden' name='id' value='" . $row['id'] . "'>");
                            printf("<input type='text' pattern='\d*'  placeholder='Введите новую цену' name='new_price'>");
                            printf("<input name='change_status' type='submit' value='Изменить цену'>");
                            $query_num_rows = ($query_num_rows - 1);
                        }
                        printf("</form>");
                    }
                ?>
                <?php 
                    require_once "vendor/connect.php";
                    $query = mysqli_query($connect, "SELECT * FROM `pricelist` WHERE `id` = 3");
                    $query_num_rows = mysqli_num_rows($query);
                    if ($query_num_rows > 0) {
                        printf("<form action='vendor/change_price.php' method='POST'>");
                        while ($row = mysqli_fetch_assoc($query)) {
                            printf("<div style='padding: 10px;' class='prices'>Пейзаж: " . $row['price'] . " руб</div>");
                            printf("<input type='hidden' name='id' value='" . $row['id'] . "'>");
                            printf("<input type='text' pattern='\d*' placeholder='Введите новую цену' name='new_price'>");
                            printf("<input name='change_status' type='submit' value='Изменить цену'>");
                            $query_num_rows = ($query_num_rows - 1);
                        }
                        printf("</form>");
                    }
                ?>
            </div>
       </div>
       <div class="gallery_admin">
            <div class="add_pic">
                <h2>Загрузить изображение в галерею</h2><br>
                <form action="vendor/pic_upload.php" enctype="multipart/form-data" method="post" class="add_pic_form">
                    <center><label for="genre">Жанр картины:</label><center>
                    <select name="genre">
                        <option value="nothing">--</option>
                        <option value="fantasy">Фентези</option>
                        <option value="realism">Реализм</option>
                        <option value="abstract">Абстракция</option>
                        <option value="design">Дизайн</option>
                        <option value="sketch">Набросок</option>
                    </select><br><br>
                    <input type="file" name="image" multiple accept="image/*,image/png,image/jpeg"><br><br>
                    <input type="submit" value="Загрузить">
                </form>
                <?php
                    if(isset($_SESSION['upload_status'])){
                        echo '<br><div class="msg">' . $_SESSION['upload_status'] .'</div>';
                    }
                    unset($_SESSION['upload_status']);
                ?>
            </div>
            <div class="element-2 gallery_a">
                <?php 
                    require_once "vendor/connect.php";
                    $query = mysqli_query($connect, "SELECT * FROM `uploads`");
                    $query_num_rows = mysqli_num_rows($query);
                    if ($query_num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            printf("<form action='vendor/delete_image.php' method='POST'>");
                            printf("<img src='" . $row['image_path'] . "' alt=''>");
                            printf("<input type='hidden' name='id' value='" . $row['id'] . "'>");
                            printf("<input type='hidden' name='image_path' value='" . $row['image_path'] . "'>");
                            printf("<center><input name='delete_item' type='submit' value='Удалить'></center>");
                            printf("</form>");
                            $query_num_rows = ($query_num_rows - 1);
                        }
                    }
                ?>
            </div>
       </div>
    </div>
</body>
</html>