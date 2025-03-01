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
        <h2>Задача 26</h2>
        <label for="num">Введите число:</label>
        <input type="text" id="num" name="num">
        <input type="submit" value="Отправить">
    </form>
        <?php
            if (isset($_GET['num'])) {
                $num = $_GET['num'];
                echo "Полученное число: $num";
            } else {
                echo "Число не передано.";
            }
        ?>
    </main>
</body>
</html>