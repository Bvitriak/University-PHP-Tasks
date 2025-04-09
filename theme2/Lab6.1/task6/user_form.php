<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location: email_form.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<pre>Данные формы: ";
    print_r($_POST);
    echo "</pre>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
</head>
<body>
<h1>Шаг 2: Заполните форму</h1>

<form method="POST">
    <div>
        <label for="first_name">Имя:</label>
        <input type="text" name="first_name" id="first_name" required>
    </div>

    <div>
        <label for="last_name">Фамилия:</label>
        <input type="text" name="last_name" id="last_name" required>
    </div>

    <div>
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" required>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($_SESSION['user_email']) ?>" readonly>
    </div>

    <button type="submit">Отправить</button>
</form>
</body>
</html>