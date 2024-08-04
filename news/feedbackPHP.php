<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "newstt";
$mysql = new mysqli('localhost', 'root', 'root', 'newstt');
if ($mysql == false) {
    echo "Ошибка подключения, попробуйте заново";
}


$fullName = $_POST['fullName'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];


    $sql = "INSERT INTO `contacts` (`fullName`, `address`, `phone`, `email`) VALUES ('$fullName', '$address', '$phone', '$email')";
if (mysqli_query($mysql, $sql) === TRUE) {
    echo "Запись успешно добавлена.";
} else {
    echo "Ошибка: " . $mysql->error;
}


$contacts = mysqli_query($mysql, "SELECT `fullName`, `address`, `phone`, `email` FROM `contacts`");
if ($contacts->num_rows > 0) {
    echo "<div class='table-container'>"; 
    echo "<table>";
    echo "<tr><th>ФИО</th><th>Адрес</th><th>Телефон</th><th>E-mail</th></tr>";

    while($row = $contacts->fetch_assoc()) {
        echo "<tr><td>{$row['fullName']}</td><td>{$row['address']}</td><td>{$row['phone']}</td><td>{$row['email']}</td></tr>";
    }
    echo "</table>";
    echo "</div>";
} else {
    echo "Нет данных для отображения.";
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>