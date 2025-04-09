<?php
    // Задание 1
    $a = 27;
    $b = 12;
    $c = sqrt($a**2 + $b**2);
    echo number_format($c, 2);

    // Задание 2
    $a = 27;
    $b = 12;

    $c = sqrt($a ** 2 + $b ** 2);
    $c = round($c, 2);

    echo "Второй катет: " . $c;

    // Задание 8
    $a = true;
    $b = false;
    
    echo "\$a = " . ($a ? 'true' : 'false');
    echo "\$b = " . ($b ? 'true' : 'false');

    // Задание 11
    $quieter = 'Тише';
    $go = 'едешь';
    $further = 'дальше';
    
    $line = "$quieter $go — $further будешь.";
    echo $line;

    // Задание 15
    $give = 'Дают';
    $take = 'бери'; 
    $beat = 'бьют'; 
    $run = 'беги';

    $line = $give . ' — ' . $take . ', ' . $beat . ' — ' . $run . '.';
    echo $line;

    // Задание 22
    $a = 4;
    $b = 3;
    $c = ' мандаринок';
    $a = $a + $b;
    $a .= $c;
    echo $a; 
?>
