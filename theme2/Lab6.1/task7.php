<?php
if (!isset($_COOKIE['test'])) {
    setcookie('test', '123', time() + 3600, '/');
    $message = "Кука 'test' со значением '123' установлена. Обновите страницу.";
} else {
    $message = "Значение куки 'test': " . htmlspecialchars($_COOKIE['test']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Работа с куками</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Пример работы с куками</h1>
    <p><?php echo $message; ?></p>

    <?php if (isset($_COOKIE['test'])): ?>
        <p><a href="?clear=1">Удалить куку</a></p>
    <?php endif; ?>

    <?php
    if (isset($_GET['clear'])) {
        setcookie('test', '', time() - 3600, '/');
        header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
        exit();
    }
    ?>
</body>
</html>