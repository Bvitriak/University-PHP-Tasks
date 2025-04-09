<?php
session_start();

$_SESSION['message'] = 'Привет, это данные из первой страницы!';
$_SESSION['user'] = 'Admin';

echo "Данные записаны в сессию. Перейдите на <a href='page2.php'>page2.php</a> чтобы увидеть их.";
?>