<?php
if (isset($_COOKIE['test'])) {
    setcookie('test', '', time() - 3600, '/');
    $message = "Кука 'test' была удалена.";
} else {
    $message = "Кука 'test' не существует.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Удаление куки</title>
    <meta charset="UTF-8">
</head>
<body>
<h1>Удаление куки</h1>
<p><?php echo $message; ?></p>
<p><a href="?setcookie=1">Установить куку 'test'</a></p>

<?php
if (isset($_GET['setcookie'])) {
    setcookie('test', '123', time() + 3600, '/');
    header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
    exit();
}
?>
</body>
</html>