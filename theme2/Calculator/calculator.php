<?php
session_start();

if (!isset($_SESSION['display'])) {
    $_SESSION['display'] = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $display = $_SESSION['display'];

    switch ($action) {
        case 'clear':
            $_SESSION['display'] = '';
            break;

        case 'toggleSign':
            if (!empty($display)) {
                $_SESSION['display'] = $display[0] === '-' ? substr($display, 1) : '-' . $display;
            }
            break;

        case 'percentage':
            if (is_numeric($display)) {
                $_SESSION['display'] = (float)$display / 100;
            }
            break;

        case 'calculate':
            try {
                $expression = preg_replace('/[^\d\.\+\-\*\/\(\)]/', '', $display);
                if (!empty($expression)) {
                    @eval("\$result = ($expression);");
                    $_SESSION['display'] = is_float($result) && $result == (int)$result
                        ? (int)$result
                        : $result;
                }
            } catch (Throwable $e) {
                $_SESSION['display'] = 'Ошибка';
            }
            break;

        default:
            if (is_numeric($action)) {
                $_SESSION['display'] .= $action;
            }
            elseif (in_array($action, ['+', '-', '*', '/'])) {
                $lastChar = substr($display, -1);
                if (in_array($lastChar, ['+', '-', '*', '/'])) {
                    $_SESSION['display'] = substr($display, 0, -1) . $action;
                } else {
                    $_SESSION['display'] .= $action;
                }
            }
            elseif ($action === '.') {
                $parts = preg_split('/[\+\-\*\/]/', $display);
                $lastPart = end($parts);
                if (!str_contains($lastPart, '.')) {
                    $_SESSION['display'] .= '.';
                }
            }
            break;
    }

    echo $_SESSION['display'];
    exit;
}
?>