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
        <h2>Задача 27</h2>
        <label for="number">Введите число (1 или 2):</label>
        <input type="text" id="number" name="number">
        <input type="submit" value="Отправить">
    </form>
        <?php
            if (isset($_GET['number'])) {
                $num = $_GET['number'];

                if ($num == 1) {
                    echo "привет";
                } elseif ($num == 2) {
                    echo "пока";
                } else {
                    echo "Передано недопустимое число. Допустимые значения: 1 или 2.";
                }
            } else {
                echo "Число не передано.";
            }
        ?>
    </main>
</body>
</html>