<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <title>Document</title>
</head>
<body>
    <div class="site">
        <header>
            <div class="header_nav">
                <div class="site_name">Имя Сайта</div>
                <div><a href="index.php">Главная</a></div>
                <div><a href="gallery.php">Галерея</a></div>
            </div>
        </header>
        <div class="about_us">
            <div id="B1E1"> <!-- BnEn - Блок n, Элемент n, так обозначаются элементы к которым обращается файл стиля, но которым разработик сайта посчитал не давать конкретного имени -->
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
                <h2>Обо мне</h2><br>
                <div id="B1E3">
                    Приветствую вас в своем художественном архиве, где я представляю свою страсть и творческое путешествие.
                    С ранних лет я ощущал непреодолимое влечение к искусству.
                    Это увлечение побудило меня посвятить свою жизнь оттачиванию своего таланта, 
                    получая классическое художественное образование и наставничество у выдающихся мастеров.
                </div>
            </div>
        </div>
    </div>
</body>
</html>