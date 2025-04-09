<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['user_email'] = $email;
        header('Location: user_form.php');
        exit();
    } else {
        $error = "Введите корректный email адрес";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Введите ваш email</title>
</head>
<body>
<h1>Шаг 1: Введите ваш email</h1>

<?php if (isset($error)): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>

<form method="POST">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <button type="submit">Продолжить</button>
</form>
</body>
</html>