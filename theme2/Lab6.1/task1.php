<?php
session_start();

if (!isset($_SESSION['test_text'])) {
    $_SESSION['test_text'] = 'test';
    echo "Текст 'test' был записан в сессию. Обновите страницу чтобы увидеть его.";
} else {
    echo "Содержимое сессии: " . $_SESSION['test_text'];
}
?>

