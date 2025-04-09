<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['birthdate'])) {
    $_SESSION['birthdate'] = $_POST['birthdate'];
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

function daysUntilBirthday($birthdate) {
    $today = new DateTime();
    $birthday = new DateTime($birthdate);

    $nextBirthday = new DateTime($today->format('Y') . '-' . $birthday->format('m-d'));

    if ($nextBirthday < $today) {
        $nextBirthday->modify('+1 year');
    }

    $interval = $today->diff($nextBirthday);
    return $interval->days;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>День рождения</title>
</head>
<body>
<h1>День рождения</h1>

<?php if (!isset($_SESSION['birthdate'])): ?>
    <form method="POST">
        <label for="birthdate">Введите вашу дату рождения:</label><br>
        <input type="date" name="birthdate" id="birthdate" required>
        <button type="submit">Сохранить</button>
    </form>
<?php else:
    $days = daysUntilBirthday($_SESSION['birthdate']);
    $birthdate = new DateTime($_SESSION['birthdate']);
    $today = new DateTime();

    if ($birthdate->format('m-d') === $today->format('m-d')):
        ?>
        <div class="birthday-message happy-birthday">
            🎉 С Днем Рождения! 🎂<br>
            Сегодня ваш особенный день!
        </div>
    <?php else: ?>
        <div class="birthday-message countdown">
            До вашего дня рождения осталось: <?php echo $days; ?> дней!
        </div>
        <p>Ваша дата рождения: <?php echo $birthdate->format('d.m.Y'); ?></p>
        <p><a href="?reset=1">Ввести другую дату</a></p>
    <?php endif; endif; ?>

<?php
if (isset($_GET['reset'])) {
    unset($_SESSION['birthdate']);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>
</body>
</html>