<?php
session_start();

if (!isset($_SESSION['user_country'])) {
    header('Location: index.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Просмотр страны</title>
</head>
<body>
    <h1>Сохраненная страна пользователя</h1>
    <p>Вы указали страну: <strong><?php echo $_SESSION['user_country']; ?></strong></p>
    <p><a href="index.php">Вернуться назад</a></p>

    <?php
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    ?>
</body>
</html>