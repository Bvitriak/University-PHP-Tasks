<?php
session_start();

$cookie_expire = time() + (30 * 24 * 60 * 60);

if (isset($_COOKIE['visit_count'])) {
    $count = $_COOKIE['visit_count'] + 1;
} else {
    $count = 1;
}

setcookie('visit_count', $count, $cookie_expire, '/');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Счетчик посещений</title>
</head>
<body>
<div class="counter">
    Вы посетили наш сайт <?php echo $count; ?> раз!
</div>

<p style="margin-top: 20px;">
    <a href="?reset=1">Сбросить счетчик</a>
</p>

<?php
if (isset($_GET['reset'])) {
    setcookie('visit_count', 0, $cookie_expire, '/');
    header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
    exit();
}
?>
</body>
</html>