<?php
session_start();

$current_time = time();

if (!isset($_SESSION['first_visit_time'])) {
    $_SESSION['first_visit_time'] = $current_time;
    $message = "Вы только что зашли на сайт. Время записано.";
} else {
    $time_diff = $current_time - $_SESSION['first_visit_time'];
    $message = "С момента вашего первого захода прошло: " . $time_diff . " секунд";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Таймер посещения</title>
</head>
<body>
    <h1>Трекер времени на сайте</h1>
    <p><?php echo $message; ?></p>

    <p><a href="time_tracker.php">Обновить страницу</a></p>

    <?php if (isset($_SESSION['first_visit_time'])): ?>
        <p>Ваше время первого захода:
           <?php echo date('Y-m-d H:i:s', $_SESSION['first_visit_time']); ?></p>
    <?php endif; ?>
</body>
</html>