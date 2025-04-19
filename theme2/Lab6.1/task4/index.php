<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['country'])) {
    $_SESSION['user_country'] = htmlspecialchars($_POST['country']);
    header('Location: index.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Выбор страны</title>
</head>
<body>
    <?php if (isset($_SESSION['user_country'])): ?>
        <h2>Вы выбрали страну: <?php echo $_SESSION['user_country']; ?></h2>
        <p>Перейдите на <a href="test.php">test.php</a> чтобы увидеть сохраненную страну</p>
    <?php else: ?>
        <h2>Укажите вашу страну</h2>
        <form method="POST" action="index.php">
            <select name="country" required>
                <option value="">-- Выберите страну --</option>
                <option value="Россия">Россия</option>
                <option value="Беларусь">Беларусь</option>
                <option value="Казахстан">Казахстан</option>
                <option value="Другая">Другая</option>
            </select>
            <button type="submit">Сохранить</button>
        </form>
    <?php endif; ?>
</body>
</html>
