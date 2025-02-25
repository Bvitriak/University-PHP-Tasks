<?php
// Устанавливаем временную зону на Москву
date_default_timezone_set('Europe/Moscow');

// Получаем текущее время
$currentTime = date('H:i:s');
echo "Московское время: " . $currentTime;
?>