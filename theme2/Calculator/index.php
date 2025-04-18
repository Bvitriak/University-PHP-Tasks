<?php
require_once 'Calculator.php';

$calculator = new Calculator();
$calculator->handleRequest();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="calculator">
        <form method="post">
            <input type="text" id="display" name="display" 
                   value="<?= htmlspecialchars($calculator->getDisplay()) ?>" readonly>
            <input type="hidden" name="expression" 
                   value="<?= htmlspecialchars($calculator->getExpression()) ?>">
            <input type="hidden" name="history" 
                   value="<?= htmlspecialchars(json_encode($calculator->getHistory())) ?>">
            <input type="hidden" name="resetDisplay" 
                   value="<?= $calculator->getResetDisplay() ? 'true' : 'false' ?>">
            
            <div class="buttons">
                <button type="submit" name="action" value="clear" class="light-gray">C</button>
                <button type="submit" name="action" value="toggleSign" class="light-gray">+/-</button>
                <button type="submit" name="action" value="percentage" class="light-gray">%</button>
                <button type="submit" name="action" value="/" class="operator">/</button>
                
                <button type="submit" name="action" value="7">7</button>
                <button type="submit" name="action" value="8">8</button>
                <button type="submit" name="action" value="9">9</button>
                <button type="submit" name="action" value="*" class="operator">*</button>
                
                <button type="submit" name="action" value="4">4</button>
                <button type="submit" name="action" value="5">5</button>
                <button type="submit" name="action" value="6">6</button>
                <button type="submit" name="action" value="-" class="operator">-</button>
                
                <button type="submit" name="action" value="1">1</button>
                <button type="submit" name="action" value="2">2</button>
                <button type="submit" name="action" value="3">3</button>
                <button type="submit" name="action" value="+" class="operator">+</button>
                
                <button type="submit" name="action" value="0" class="zero">0</button>
                <button type="submit" name="action" value=".">.</button>
                <button type="submit" name="action" value="calculate" class="operator equals">=</button>
            </div>
        </form>
    </div>
    
    <div class="history">
        <h3>История вычислений:</h3>
        <?php foreach ($calculator->getHistory() as $entry): ?>
            <div><?= htmlspecialchars($entry) ?></div>
        <?php endforeach; ?>
    </div>
</body>
</html>