<?php
$filePath = __DIR__ . '/test.txt'; 
$text = '12345';
$file = fopen($filePath, 'w');

if ($file) {
    fwrite($file, $text);
    fclose($file);

    echo "Текст успешно записан в файл.";
} else {
    echo "Ошибка: не удалось открыть файл для записи.";
}
?>