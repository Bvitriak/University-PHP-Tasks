<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
    <form action="" method="get">
        <h2>Задача 28</h2>
        <label for="num1">Введите первое число:</label>
        <input type="text" id="num1" name="num1">
        <br>
        <label for="num2">Введите второе число:</label>
        <input type="text" id="num2" name="num2">
        <input type="submit" value="Отправить">
    </form>
        <?php
            if (isset($_GET['num1']) && isset($_GET['num2'])) {
                $num1 = $_GET['num1'];
                $num2 = $_GET['num2'];

                if (is_numeric($num1) && is_numeric($num2)) {
                    $sum = $num1 + $num2;
                    echo "Сумма чисел $num1 и $num2 равна: $sum";
                } else {
                    echo "Оба параметра должны быть числами.";
                }
            } else {
                echo "Необходимо передать два числа в параметрах 'num1' и 'num2'.";
            }
        ?>
    </main>
</body>
</html>