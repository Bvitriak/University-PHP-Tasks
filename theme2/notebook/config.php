<?php
define('ACCESS_ALLOWED', true);

// Настройки для MAMP
$host = 'localhost';
$db   = 'contacts_db';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';
$port = 8889;

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}
?>
