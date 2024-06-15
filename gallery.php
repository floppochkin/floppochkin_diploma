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
    <script src="assets/js/autofilter.js"></script>
    <script src="assets/js/initilize_af_script.js"></script>
    
    <title>Document</title>
</head>
<body>
    <div class="site">
        <header>
            <div class="header_nav">
                <div class="site_name">Галерея Антонио</div>
                <div><a href="index.php">Главная</a></div>
                <div><a href="commission.php">Заказать услуги</a></div>
            </div>
        </header>
        <div class="filter_nav">
            <span class="filter_header">Фильтрация</span>
            <div class="filter_options">
                <span data-filter>Показать все</span>
                <span data-filter="fantasy">Фентези</span>
                <span data-filter="realism">Реализм</span>
                <span data-filter="abstract">Абстракция</span>
                <span data-filter="design">Дизайн</span>
                <span data-filter="sketch">Набросок</span>
            </div>
        </div>
        <div class="element-1">
            <?php 
                require_once "vendor/connect.php";
                $query = mysqli_query($connect, "SELECT * FROM `uploads`");
                $query_num_rows = mysqli_num_rows($query);
                if ($query_num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        printf("<a data-tags='". $row['genre'] . "' href='" . $row['image_path'] . "'>");
                        printf("<img src='" . $row['image_path'] . "' alt=''>");
                        printf("<input type='hidden' name='id' value='" . $row['id'] . "'>");
                        printf("</a>");
                        $query_num_rows = ($query_num_rows - 1);
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>