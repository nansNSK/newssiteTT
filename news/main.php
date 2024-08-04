<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "newstt";
$mysql = new mysqli('localhost', 'root', 'root', 'newstt');
if ($mysql == false) {
    echo "Ошибка подключения, попробуйте заново";
}
$result = mysqli_query($mysql, "SELECT `title`, `content`, `publish_date` FROM `news` ORDER BY `publish_date` DESC LIMIT 3");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newsCSS.css">
    <title>Последние новости</title>
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
                
                $content = htmlspecialchars($row["content"]);
                $first_sentence = strtok($content, '.');
                echo '<p>' . $first_sentence . '...</p>'; 
                
                echo '</div>';
            }
        } else {
            echo '<div class="news-block"><p>Нет новостей</p></div>';
        }
        ?>
        
        <div class="links">
            <a href="news.php">Все новости</a>
        </div>    
            <div class="links">
                <a href="feedbackHTML.html">Обратная связь</a>
        </div>
    </div>
</body>
</html>