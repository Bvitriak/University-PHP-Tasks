<?php
session_start();

if (isset($_SESSION['message'])) {
    echo "<h1>Данные из сессии:</h1>";
    echo "<p>Сообщение: " . $_SESSION['message'] . "</p>";
    echo "<p>Пользователь: " . $_SESSION['user'] . "</p>";
} else {
    echo "В сессии нет данных. Вернитесь на <a href='page1.php'>page1.php</a> чтобы записать их.";
}
?>