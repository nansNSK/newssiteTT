<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "newstt";
$mysql = new mysqli('localhost', 'root', 'root', 'newstt');
if ($mysql == false) {
    echo "Ошибка подключения, попробуйте заново";
}
$result = mysqli_query($mysql, "SELECT `title`, `content`, `publish_date` FROM `news` LIMIT 5");
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="newsCSS.css">
    <title>Новости</title>
</head>
<body>
    <div class="container">
        <h1>Последние новости</h1>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="news-block">';
                echo '<h2>' . htmlspecialchars($row["title"]) . '</h2>';
                echo '<p class="date">' . htmlspecialchars($row["publish_date"]) . '</p>';
                echo '<p>' . htmlspecialchars($row["content"]) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<div class="news-block"><p>Нет новостей</p></div>';
        }
        ?>
    </div>
</body>
</html>
