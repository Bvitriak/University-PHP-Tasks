<?php
spl_autoload_register(function ($className) {
    // Удаляем начальные обратные слеши
    $className = ltrim($className, '\\');

    // Заменяем префикс src\ на пустую строку
    $className = str_replace('src\\', '', $className);

    // Формируем путь к файлу
    $filePath = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';

    if (file_exists($filePath)) {
        require $filePath;
    } else {
        // Для отладки - выводим информацию о том, что искали
        error_log("Autoload failed. Tried to load: $className from $filePath");
        throw new RuntimeException("Class $className not found at $filePath");
    }
});
