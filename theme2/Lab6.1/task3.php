<?php
session_start();

if (!isset($_SESSION['page_refresh_count'])) {
    $_SESSION['page_refresh_count'] = 0;
    echo "Вы еще не обновляли эту страницу.";
} else {
    $_SESSION['page_refresh_count']++;
    echo "Количество обновлений страницы: " . $_SESSION['page_refresh_count'];
}
echo "<br><a href='?reset=1'>Сбросить счетчик</a>";

if (isset($_GET['reset'])) {
    $_SESSION['page_refresh_count'] = 0;
    header("Location: " . strtok($_SERVER['REQUEST_URI'], '?'));
    exit();
}
?>