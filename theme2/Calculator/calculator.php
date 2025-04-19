<?php
$action = $_POST['action'] ?? '';
$display = $_POST['display'] ?? '0';
$expression = $_POST['expression'] ?? '';
$reset = ($_POST['reset'] ?? 'false') === 'true';

if (is_numeric($action)) {
    if ($display === '0' || $reset) {
        $display = $action;
        $reset = false;
    } else {
        $display .= $action;
    }
} elseif ($action === '.') {
    if (strpos($display, '.') === false) {
        $display .= '.';
    }
} elseif (in_array($action, ['+', '-', '*', '/'])) {
    $expression = $display . $action;
    $reset = true;
} elseif ($action === '=') {
    $expression .= $display;
    $display = calculateExpression($expression);
    $expression = '';
    $reset = true;
} elseif ($action === 'clear') {
    $display = '0';
    $expression = '';
    $reset = false;
} elseif ($action === '%') {
    $display = (float)$display / 100;
} elseif ($action === 'negate') {
    $display = $display[0] === '-' ? substr($display, 1) : '-' . $display;
}

function calculateExpression($expr) {
    $expr = str_replace(' ', '', $expr);

    while (preg_match('/\(([^()]+)\)/', $expr, $matches)) {
        $innerResult = calculateExpression($matches[1]);
        $expr = str_replace($matches[0], $innerResult, $expr);
    }

    while (preg_match('/(-?\d+\.?\d*)([\/\*])(-?\d+\.?\d*)/', $expr, $matches)) {
        $result = $matches[2] === '*' ? $matches[1] * $matches[3] : $matches[1] / $matches[3];
        $expr = str_replace($matches[0], $result, $expr);
    }

    while (preg_match('/(-?\d+\.?\d*)([\+\-])(-?\d+\.?\d*)/', $expr, $matches)) {
        $result = $matches[2] === '+' ? $matches[1] + $matches[3] : $matches[1] - $matches[3];
        $expr = str_replace($matches[0], $result, $expr);
    }

    return $expr;
}

header("Location: index.html?display=" . urlencode($display) .
    "&expression=" . urlencode($expression) .
    "&reset=" . ($reset ? 'true' : 'false'));
exit();
?>