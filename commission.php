<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="icon" type="image/x-icon" href="assets/img/art-icon.svg">
    <title>Галерея Антонио</title>
</head>
<body>
    <div class="site">
        <header>
            <div class="header_nav">
                <div class="site_name">Галерея Антонио</div>
                <div><a href="index.php">Главная</a></div>
                <div><a href="gallery.php">Галерея</a></div>
            </div>
        </header>
        <div class="prices_n_payment">
            <div class="prices">
                <div id="B1E1_c"> <!-- BnEn - Блок n, Элемент n, так обозначаются элементы к которым обращается файл стиля, но которым разработик сайта посчитал не давать конкретного имени -->
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
                            }
                        ?>
                    </div>
                    <br>
                </div>
                <div id="B1E2">
                    <h2>Ценовой лист</h2><br>
                    <div id="B1E3_c">
                        <?php 
                            require_once "vendor/connect.php";
                            $query = mysqli_query($connect, "SELECT * FROM `pricelist` WHERE `id` = 1");
                            $query_num_rows = mysqli_num_rows($query);
                            if ($query_num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($query)) {
                                    printf("<div style='padding: 10px;' class='prices'>Портрет: " . $row['price'] . " руб</div>");
                                    $query_num_rows = ($query_num_rows - 1);
                                }
                            }
                            $query = mysqli_query($connect, "SELECT * FROM `pricelist` WHERE `id` = 2");
                            $query_num_rows = mysqli_num_rows($query);
                            if ($query_num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($query)) {
                                    printf("<div style='padding: 10px;' class='prices'>Картина в полный рост: " . $row['price'] . " руб</div>");
                                    $query_num_rows = ($query_num_rows - 1);
                                }
                            }
                            $query = mysqli_query($connect, "SELECT * FROM `pricelist` WHERE `id` = 3");
                            $query_num_rows = mysqli_num_rows($query);
                            if ($query_num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($query)) {
                                    printf("<div style='padding: 10px;' class='prices'>Пейзаж: " . $row['price'] . " руб</div>");
                                    $query_num_rows = ($query_num_rows - 1);
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="socials">
                <div id="B2E1">
                    <h2>Способы оплаты</h2><br>
                    <div id="B2E2">
                        <ul> 
                            <li>Boosty - <a href="#">[Boosty блог художника]</a></li>
                            <li>СБП через QR код - <a href="#">[Оплата через банк]</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact_us">
            <h2>Обратная связь</h2>
            <div class="contact_info">Для связи со мной для заказа услуг используйте следующие ссылки</div>
            <div class="contact_links">
                <ul> 
                    <li>Telegram - <a href="#">@toniotg</a></li>
                    <li>Вконтакте - <a href="#">vk.com/tonio</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>