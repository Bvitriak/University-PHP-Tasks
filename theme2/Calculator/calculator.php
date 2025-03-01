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
            $lastChar = substr($display, -1);
            if (in_array($lastChar, ['+', '-', '*', '/'])) {
                $_SESSION['display'] = substr($display, 0, -1) . ' ' . $action . ' ';
            } else {
                $_SESSION['display'] .= ' ' . $action . ' ';
            }
            break;

        case '.':
            $lastNumber = explode(' ', $display);
            $lastNumber = end($lastNumber);
            if (!str_contains($lastNumber, '.')) {
                $_SESSION['display'] .= '.';
            }
            break;

        case 'calculate':
            try {
                $result = eval('return ' . $display . ';');
                $_SESSION['display'] = $result;
            } catch (Exception $e) {
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