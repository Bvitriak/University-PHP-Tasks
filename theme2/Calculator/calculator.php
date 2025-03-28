<?php
session_start();

if (!isset($_SESSION['display'])) {
    $_SESSION['display'] = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $display = $_SESSION['display'];

    switch ($action) {
        case 'clear':
            $_SESSION['display'] = '';
            break;

        case 'toggleSign':
            if (!empty($display)) {
                if ($display[0] === '-') {
                    $_SESSION['display'] = substr($display, 1);
                } else {
                    $_SESSION['display'] = '-' . $display;
                }
            }
            break;

        case 'percentage':
            if (!empty($display)) {
                $_SESSION['display'] = (float)$display / 100;
            }
            break;

        case '+':
        case '-':
        case '*':
        case '/':
            if (empty($display) && $action == '-') {
                $_SESSION['display'] = '-';
            } 
            else if (!empty($display)) {
                $lastChar = substr($display, -1);
                if (in_array($lastChar, ['+', '-', '*', '/'])) {
                    $_SESSION['display'] = substr($display, 0, -1) . $action;
                } else {
                    $_SESSION['display'] .= $action;
                }
            }
            break;

        case '.':
            $parts = preg_split('/[\+\-\*\/]/', $display);
            $lastPart = end($parts);
            if (!str_contains($lastPart, '.')) {
                $_SESSION['display'] .= '.';
            }
            break;

        case 'calculate':
            try {
                $expression = str_replace(' ', '', $display);
                
                if (!preg_match('/^[-+]?[\d\.]+([\+\-\*\/][-+]?[\d\.]+)*$/', $expression)) {
                    throw new Exception('Недопустимое выражение');
                }
                
                $result = eval("return $expression;");
                
                $_SESSION['display'] = is_float($result) && $result == (int)$result 
                    ? (int)$result 
                    : $result;
            } catch (Throwable $e) {
                $_SESSION['display'] = 'Ошибка';
            }
            break;

        default:
            if (is_numeric($action)) {
                $_SESSION['display'] .= $action;
            }
            break;
    }

    echo $_SESSION['display'];
    exit;
}
?>