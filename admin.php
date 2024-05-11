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
        <header><center><h1>Админская панель</h1></center><a href="vendor/logout.php">Выйти</a></header>
       <div class="gallery_admin">
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
            <div class="element-1 gallery_a">
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
                            printf("<center><input style='margin-top: 15px;'  name='delete_item' type='submit' value='Удалить'></center>");
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