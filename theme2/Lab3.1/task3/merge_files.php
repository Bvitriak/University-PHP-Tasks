<?php
$files = ['1.txt', '2.txt', '3.txt'];

$mergedContent = '';

foreach ($files as $file) {
    $filePath = __DIR__ . '/' . $file;

    if (file_exists($filePath)) {
        $content = file_get_contents($filePath);
        $mergedContent .= $content;
    } else {
        echo "Ошибка: файл $file не существует.<br>";
    }
}

$newFilePath = __DIR__ . '/new.txt';

if (file_put_contents($newFilePath, $mergedContent) !== false) {
    echo "Файл new.txt успешно создан и заполнен.";
} else {
    echo "Ошибка: не удалось записать данные в файл new.txt.";
}
?>