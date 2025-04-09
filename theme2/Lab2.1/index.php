<?php
 /*   $arr = [2, 'r', 6, 8];
    for ($i = 0; $i < sizeof($arr); $i++){
        echo $arr[$i]. '';
    }

    $arr2[1] = 2;
    $arr2['b'] = 'r';
    $arr2['c'] = 6;
    $arr2[4] = 8;
    echo $arr2[2], '<br>';

    var_dump($arr2);
    echo '<br>';
    for ($i = 0; $i < sizeof($arr2); $i++){
        echo $arr2[$i]. '';
    }

    $arr3 = {
        i => 2,
        'b' => 'r',
        'c' => 6,
        4 => 8
    };

foreach($arr3 as $elen){
    echo '$elen=''<br>';
}

$a = array(1.2);
$b = array(1,2);
print_r($a == $b);
echo '<br>';

print_r($a+$b);

$c = {
    'a' => 'b',
    2 => 'c',
    'd' => 1
};

$c = {
    'a' => 'f',
    3 => 'c',
    '4' => 1
};

print_r($c);
echo '<br>';
print_r($d);
echo '<br>';
print_r($c + $d);
echo '<br>';

$arr_2 = {
    1 => [1,2,3],
    'a' => [5,6,'a','1'],
    3 => [6,7,8,9]
}

fireach($arr_2 as $arr){
    // print_r($arr);
    foreach($arr as $elem){
        echo "$elem,";
    }
    echo'<br>';
}

f(x) = pow(x,2);

$a = 2;
$b = 4;
function f($a, $b): int
{
    global $c;
    $c = $a + $b;
    return $c;
}
echo $c; */

//Задание 1: array_count_values
$arr = array('a', 'b', 'c', 'b', 'a');
$result = array_count_values($arr);
print_r($result);
echo '<br>';

// Задание 2: array_reverse
$arr = array('a' => 1, 'b' => 2, 'c' => 3);
$reversedArr = array_reverse($arr);
print_r($reversedArr);
echo '<br>';

// Задание 4: array_combine
$keys = array('a', 'b', 'c');
$values = array(1, 2, 3);
$combinedArr = array_combine($keys, $values);
print_r($combinedArr);
echo '<br>';

// Задание 6: array_map, strtoupper
$arr = array('a', 'b', 'c', 'd', 'e');
$upperArr = array_map('strtoupper', $arr);
print_r($upperArr);
echo '<br>';

// Задание 7: array_merge
$keys = array(1, 2, 3);
$values = array('a', 'b', 'c');
$newArr = array_merge($keys, $values);
print_r($newArr);
echo '<br>';

// Задание 8: array_product
$arr = array(1, 2, 3, 4, 5);
$countArr = array_product($arr);
print_r($countArr);
echo '<br>';

//Задание 9: array_rand
$arr = array('a' => 1, 'b' => 2, 'c' => 3);
$randArr = array_rand($arr);
print_r($randArr);
echo '<br>';
?>
