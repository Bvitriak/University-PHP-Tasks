<?php
$sourceFile = __DIR__ . '/test.txt';
$destinationFile = __DIR__ . '/copy.txt';

if (file_exists($sourceFile)) {
    if (copy($sourceFile, $destinationFile)) {
        echo "Файл успешно скопирован в copy.txt.";
    } else {
        echo "Ошибка: не удалось скопировать файл.";
    }
} else {
    echo "Ошибка: исходный файл test.txt не существует.";
}
?>