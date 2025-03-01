<?php
$oldFilePath = __DIR__ . '/old.txt';
$newFilePath = __DIR__ . '/new.txt';

if (file_exists($oldFilePath)) {
    // Переименовываем файл
    if (rename($oldFilePath, $newFilePath)) {
        echo "Файл успешно переименован в new.txt.";
    } else {
        echo "Ошибка: не удалось переименовать файл.";
    }
} else {
    echo "Ошибка: исходный файл old.txt не существует.";
}
?>