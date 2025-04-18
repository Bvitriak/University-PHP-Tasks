<?php
class Calculator {
    private $display = '0';
    private $expression = '';
    private $history = [];
    private $resetDisplay = false;

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $action = $_POST['action'] ?? '';
            $this->display = $_POST['display'] ?? '0';
            $this->expression = $_POST['expression'] ?? '';
            $this->history = isset($_POST['history']) ? json_decode($_POST['history'], true) : [];
            $this->resetDisplay = $_POST['resetDisplay'] ?? false;

            $this->processAction($action);
        }
    }

    private function processAction($action) {
        if (is_numeric($action)) {
            $this->handleNumber($action);
        } elseif (in_array($action, ['+', '-', '*', '/'])) {
            $this->handleOperator($action);
        } elseif ($action === '.') {
            $this->handleDecimal();
        } elseif ($action === 'clear') {
            $this->clear();
        } elseif ($action === 'toggleSign') {
            $this->toggleSign();
        } elseif ($action === 'percentage') {
            $this->percentage();
        } elseif ($action === 'calculate') {
            $this->calculate();
        }
    }

    private function handleNumber($number) {
        if ($this->display === '0' || $this->display === 'Ошибка' || $this->resetDisplay) {
            $this->display = $number;
            $this->resetDisplay = false;
        } else {
            $this->display .= $number;
        }
    }

    private function handleOperator($operator) {
        if (!empty($this->expression) {
            $this->expression .= $this->display . $operator;
        } else {
            $this->expression = $this->display . $operator;
        }
        $this->resetDisplay = true;
    }

    private function handleDecimal() {
        if ($this->resetDisplay) {
            $this->display = '0.';
            $this->resetDisplay = false;
        } elseif (!str_contains($this->display, '.')) {
            $this->display .= '.';
        }
    }

    private function clear() {
        $this->display = '0';
        $this->expression = '';
        $this->resetDisplay = false;
    }

    private function toggleSign() {
        if ($this->display !== '0' && $this->display !== 'Ошибка') {
            $this->display = $this->display[0] === '-' ? substr($this->display, 1) : '-' . $this->display;
        }
    }

    private function percentage() {
        if (is_numeric($this->display)) {
            $this->display = (float)$this->display / 100;
        }
    }

    private function calculate() {
        $fullExpression = $this->expression . $this->display;
        $result = $this->calculateExpression($fullExpression);
        
        if (is_numeric($result)) {
            $this->history[] = $fullExpression . ' = ' . $result;
            $this->display = $result;
        } else {
            $this->history[] = $fullExpression . ': ' . $result;
            $this->display = 'Ошибка';
        }
        $this->expression = '';
        $this->resetDisplay = true;
    }

    private function calculateExpression($expr) {
        if (empty($expr)) return 'Выражение не задано';
        
        $expr = str_replace(' ', '', $expr);
        
        if (!$this->validBrackets($expr)) return 'Неправильная расстановка скобок';
        
        if ($expr[0] === '-') $expr = '0' . $expr;
        
        while (preg_match('/\(([^()]+)\)/', $expr, $matches)) {
            $innerResult = $this->calculateExpression($matches[1]);
            if (!is_numeric($innerResult)) return $innerResult;
            $expr = str_replace($matches[0], $innerResult, $expr);
        }
        
        return $this->calculateWithoutBrackets($expr);
    }

    private function calculateWithoutBrackets($expr) {
        if ($this->isnum($expr)) return $expr;
        
        while (preg_match('/(-?\d+\.?\d*)([\/\*])(-?\d+\.?\d*)/', $expr, $matches)) {
            $result = $matches[2] === '*' ? $matches[1] * $matches[3] : 
                     ($matches[3] != 0 ? $matches[1] / $matches[3] : 'Деление на ноль');
            if (!is_numeric($result)) return $result;
            $expr = str_replace($matches[0], $result, $expr);
        }
        
        while (preg_match('/(-?\d+\.?\d*)([\+\-])(-?\d+\.?\d*)/', $expr, $matches)) {
            $result = $matches[2] === '+' ? $matches[1] + $matches[3] : $matches[1] - $matches[3];
            $expr = str_replace($matches[0], $result, $expr);
        }
        
        return $expr;
    }

    private function isnum($x) {
        if (empty($x) || $x === '.') return false;
        if ($x[0] === '-' && strlen($x) > 1) $x = substr($x, 1);
        if ($x[0] === '0' && strlen($x) > 1 && $x[1] !== '.') return false;
        if ($x[strlen($x)-1] === '.') return false;
        
        $point_count = 0;
        for ($i = 0; $i < strlen($x); $i++) {
            if ($x[$i] === '.') {
                $point_count++;
                if ($point_count > 1) return false;
            } elseif (!is_numeric($x[$i])) {
                return false;
            }
        }
        return true;
    }

    private function validBrackets($expr) {
        $balance = 0;
        for ($i = 0; $i < strlen($expr); $i++) {
            if ($expr[$i] === '(') $balance++;
            if ($expr[$i] === ')') $balance--;
            if ($balance < 0) return false;
        }
        return $balance === 0;
    }

    public function getDisplay() { return $this->display; }
    public function getExpression() { return $this->expression; }
    public function getHistory() { return $this->history; }
    public function getResetDisplay() { return $this->resetDisplay; }
}
?>