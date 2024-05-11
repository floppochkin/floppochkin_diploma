<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/gallery.style.css">
    <link rel="stylesheet" href="assets/css/lightgallery.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/lightgallery.min.js"></script>
    <script src="assets/js/script.js"></script>
    
    <title>Document</title>
</head>
<body>
    <div class="site">
        <header>
            <div class="header_nav">
                <div class="site_name">Имя Сайта</div>
                <div><a href="index.php">Главная</a></div>
                <div><a href="#">Заказать услуги</a></div>
            </div>
        </header>
        <div class="element-1">
            <?php 
                require_once "vendor/connect.php";
                $query = mysqli_query($connect, "SELECT * FROM `uploads`");
                $query_num_rows = mysqli_num_rows($query);
                if ($query_num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        printf("<a href='" . $row['image_path'] . "'>");
                        printf("<img src='" . $row['image_path'] . "' alt=''>");
                        printf("<input type='hidden' name='id' value='" . $row['id'] . "'>");
                        printf("</a>");
                        $query_num_rows = ($query_num_rows - 1);
                    }
                }
            ?>
           <!--  <a href="assets/img/1.jpg">
                <img src="assets/img/1.jpg" alt="">
            </a> -->
        </div>
    </div>
</body>
</html>